# Avada Accessible Child Theme

This child theme enhances the accessibility features of the Avada Wordpress theme by introducing custom options to improve focus outlines and external link accessibility. It aims to provide a more inclusive web experience for users who rely on keyboard navigation and screen readers.

## Features

### Focus Accessibility

1. **Focus Outline Style**
   - **Description:** Customize the style of the focus outline for better visibility.
   - **Options:** Solid, Dashed, Dotted, Double, None
   - **Default:** Solid

2. **Focus Outline Width**
   - **Description:** Set the width of the focus outline in pixels.
   - **Input:** Text field (numeric values in px)
   - **Default:** 2px

3. **Focus Outline Color**
   - **Description:** Select the color of the focus outline.
   - **Input:** Color picker
   - **Default:** #000000 (Black)
     
4. **Focus Outline Offset**
   - **Description:** Enter the offset of the outline in pixels.
   - **Input:** Text field (numeric values in px)
   - **Default:** 1px

4. **Focus Trigger**
   - **Description:** Choose whether to enable focus outlines only for keyboard navigation or for both mouse clicks and keyboard navigation.
   - **Options:** Keyboard Focus Only, Both Mouse Click and Keyboard Tab Focus
   - **Default:** Keyboard Focus Only

### External Link Accessibility

1. **External URL Example Text**
   - **Description:** Provide example text for external URLs to indicate they open in a new tab.
   - **Input:** Text field
   - **Default:** Open in new tab

2. **External Link Accessible Text**
   - **Description:** Select how the accessible text for external links should be added.
   - **Options:** As `sr-only` text, As `aria-label` text
   - **Default:** As `sr-only` text

3. **Show Accessible Text as Tooltip**
   - **Description:** Choose whether to display the accessible text for external links as a tooltip. This option is available only when `sr-only` text is selected.
   - **Options:** Yes, No
   - **Default:** No

## Installation

1. **Download and Install Avada Theme**
   - Ensure you have the Avada theme installed and activated on your WordPress site.

2. **Download and Install the Avada Accessible Child Theme**
   - Clone or download this repository.
   - Upload the child theme to your WordPress site via the WordPress admin dashboard or using FTP.
   - Activate the Avada Accessible Child Theme from the Appearance > Themes section.

## Usage

1. **Customize Accessibility Options**
   - Navigate to Avada > Theme Options > Accessibility Options.
   - Configure the focus outline styles and external link accessibility settings as per your requirements.

2. **Focus Outline Customization**
   - Choose the desired outline style, width, and color.
   - Select the focus trigger option to specify if the outline should appear for keyboard focus only or both keyboard and mouse interactions.

3. **External Link Accessibility Customization**
   - Enter example text for external URLs.
   - Choose whether the accessible text should be added as `sr-only` or `aria-label`.
   - If `sr-only` is selected, decide whether to show the text as a tooltip.

## Contribution

We welcome contributions to enhance this child theme. Please follow these steps:

1. **Fork the Repository**
2. **Create a New Branch** (`feature/your-feature-name`)
3. **Commit Your Changes**
4. **Push to the Branch**
5. **Create a Pull Request**

## License

This project is licensed under the MIT License.

## Acknowledgements

- [Avada Theme](https://avada.theme-fusion.com/)
- [WordPress](https://wordpress.org/)

## Support

If you encounter any issues or have questions, please open an issue on GitHub.

---

Thank you for using the Avada Accessible Child Theme! We hope this theme helps improve the accessibility of your website.
