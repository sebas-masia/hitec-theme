from PIL import Image, ImageOps
import os
from pathlib import Path
import logging

# Set up logging
logging.basicConfig(level=logging.INFO,
                    format='%(asctime)s - %(levelname)s - %(message)s')


def invert_logo_colors(img):
    """
    Invert colors of a logo while preserving transparency
    """
    if img.mode == 'RGBA':
        # Split the image into channels
        r, g, b, a = img.split()
        # Invert the RGB channels
        rgb = Image.merge('RGB', (r, g, b))
        inverted_rgb = ImageOps.invert(rgb)
        # Split the inverted image
        r, g, b = inverted_rgb.split()
        # Merge back with original alpha
        return Image.merge('RGBA', (r, g, b, a))
    return ImageOps.invert(img)


def compress_images(quality=60, logo_files=None):
    """
    Compress all images in the images directory
    quality: 0-100, lower means more compression
    logo_files: list of logo filenames to invert colors
    """
    # Supported image formats
    SUPPORTED_FORMATS = {'.jpg', '.jpeg', '.png', '.webp', '.bmp'}

    # Get the images directory (where this script is located)
    images_dir = Path(__file__).parent
    logging.info(f"Processing images in: {images_dir}")

    # Create 'compressed' directory if it doesn't exist
    output_dir = images_dir / 'compressed'
    output_dir.mkdir(exist_ok=True)
    logging.info(f"Output directory: {output_dir}")

    # Convert logo_files to set for faster lookup
    logo_files = set(logo_files) if logo_files else set()

    # Counter for processed images
    processed = 0
    skipped = 0
    total_saved = 0

    for file_path in images_dir.iterdir():
        if file_path.suffix.lower() in SUPPORTED_FORMATS:
            try:
                # Skip if it's already in the compressed directory
                if 'compressed_' in file_path.name:
                    continue

                # Open image
                with Image.open(file_path) as img:
                    # Create output path
                    output_path = output_dir / f"compressed_{file_path.name}"

                    # Create a copy of the image to avoid modifying the original
                    img_copy = img.copy()

                    # Invert colors if it's a logo file
                    if file_path.name in logo_files:
                        img_copy = invert_logo_colors(img_copy)
                        logging.info(
                            f"Inverted colors for logo: {file_path.name}")

                    # Always preserve PNG format for PNG files
                    if file_path.suffix.lower() == '.png':
                        # Preserve original format and transparency
                        img_copy.save(output_path, 'PNG', optimize=True)
                    else:
                        # For non-PNG files, convert to JPEG if no transparency
                        if img_copy.mode in ('RGBA', 'LA') or (img_copy.mode == 'P' and 'transparency' in img_copy.info):
                            # Has transparency - convert to PNG
                            output_path = output_path.with_suffix('.png')
                            img_copy.save(output_path, 'PNG', optimize=True)
                        else:
                            # No transparency - compress as JPEG
                            img_copy = img_copy.convert('RGB')
                            output_path = output_path.with_suffix('.jpg')
                            img_copy.save(output_path, 'JPEG',
                                          optimize=True, quality=quality)

                    # Calculate compression ratio
                    original_size = os.path.getsize(file_path)
                    compressed_size = os.path.getsize(output_path)
                    saved_size = original_size - compressed_size
                    ratio = (1 - compressed_size / original_size) * 100

                    logging.info(f"Compressed {file_path.name}")
                    logging.info(
                        f"Original size: {original_size / 1024:.1f}KB")
                    logging.info(
                        f"Compressed size: {compressed_size / 1024:.1f}KB")
                    logging.info(
                        f"Saved: {saved_size / 1024:.1f}KB ({ratio:.1f}%)")
                    logging.info("-" * 50)

                    processed += 1
                    total_saved += saved_size

            except Exception as e:
                logging.error(f"Error processing {file_path.name}: {str(e)}")
                skipped += 1

    logging.info(f"\nCompression complete!")
    logging.info(f"Processed: {processed} images")
    logging.info(f"Skipped: {skipped} images")
    logging.info(f"Total space saved: {total_saved / 1024:.1f}KB")
    logging.info(f"\nCompressed images are saved in: {output_dir}")


if __name__ == "__main__":
    # List of logo files to invert (add your logo filenames here)
    logos_to_invert = [
        "H007955-055-010-NOMAD ADV MID WP_WARM GREY-RED ORANGE 0F1A3877.jpg",
        "H007956-022-025 NOMAD ADV MID WP WOMENS SILVER LINING-NAVY ACADEMY_Catalogue0F1A3042.jpg"
    ]

    # Run compression with logo inversion
    compress_images(quality=60, logo_files=logos_to_invert)
