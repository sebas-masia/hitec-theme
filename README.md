# Hi-Tec WordPress Theme

A custom WordPress theme for Hi-Tec, featuring a landing page and product specifications pages.

## Prerequisites

- WordPress 5.0 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher
- Apache/Nginx web server

## Installation

1. Download the theme files
2. Upload the theme folder to your WordPress installation at `wp-content/themes/`
3. Activate the theme through WordPress admin panel (Appearance > Themes)

## WordPress Admin Setup

### 1. Create Required Pages

1. Create a new page for the landing page:

   - Title: "Hi-Tec Landing"
   - Template: Select "Hi-Tec Landing Page" from the Page Attributes
   - Publish the page

2. Create a new page for product specifications:
   - Title: "Product Specifications"
   - Template: Select "Product Specifications" from the Page Attributes
   - Publish the page
   - Note the page ID (you can find it in the URL when editing the page)

### 2. Configure Permalinks

1. Go to Settings > Permalinks
2. Select "Post name" as your permalink structure
3. Save Changes
4. Go to Settings > Permalinks and click "Save Changes" again to flush rewrite rules

### 3. Update Product Data

1. Open `functions.php` in your theme
2. Locate the `get_product_data_by_slug()` function
3. Update the product data array with your actual products
4. Each product should have the following structure:
   ```php
   'product-slug' => array(
       'name' => 'Product Name',
       'description' => 'Product Description',
       'images' => array(
           'main' => 'path/to/image.png'
       ),
       'features' => array(
           'Feature 1',
           'Feature 2',
           'Feature 3'
       ),
       'specs' => array(
           'materials' => array(
               'Material 1' => 'Description',
               'Material 2' => 'Description'
           ),
           'characteristics' => array(
               'Characteristic 1',
               'Characteristic 2'
           ),
           'usage' => array(
               'Usage 1',
               'Usage 2'
           )
       )
   )
   ```

### 4. Update Page IDs

1. Open `functions.php`
2. Locate the rewrite rule function
3. Update the page ID in the rewrite rule to match your Product Specifications page ID:
   ```php
   add_rewrite_rule(
       'producto/([^/]+)/?$',
       'index.php?page_id=YOUR_PAGE_ID&product_id=$matches[1]',
       'top'
   );
   ```

## Theme Features

- Responsive landing page design
- Product specifications pages with detailed information
- Custom URL structure for products (e.g., `/producto/product-slug`)
- Mobile-friendly navigation
- Custom styling for product displays

## File Structure

```
hitec-theme/
├── assets/
│   ├── css/
│   │   ├── hitec-landing.css
│   │   └── product-specs.css
│   ├── js/
│   │   └── carousel.js
│   └── images/
├── inc/
│   ├── template-functions.php
│   └── template-tags.php
├── template-parts/
│   └── content-*.php
├── functions.php
├── header.php
├── footer.php
├── page-hitec-landing.php
├── page-product-specs.php
└── style.css
```

## Troubleshooting

1. If product links are not working:

   - Check that permalinks are set to "Post name"
   - Verify the page ID in the rewrite rule matches your Product Specifications page
   - Flush rewrite rules by visiting Settings > Permalinks and clicking "Save Changes"

2. If images are not loading:

   - Verify image paths in the product data array
   - Check that images are uploaded to the correct directory
   - Ensure proper file permissions on the images directory

3. If the theme is not appearing correctly:
   - Clear your browser cache
   - Check for any JavaScript errors in the browser console
   - Verify all required files are present in the theme directory

## Support

For support or questions, please contact your theme developer or WordPress administrator.
