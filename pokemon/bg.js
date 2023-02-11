let body = document.getElementById("body");

// Get the root element
var r = document.querySelector(':root');

// Create a function for setting a variable value
function color_set(cvar, color) {
  // Set the value of variable --blue to another value (in this case "lightblue")
  r.style.setProperty(cvar, color);
}

function changeGradient(c1, c2, c3){
    color_set("--color1", c1);
    color_set("--color2", c2);
    color_set("--color3", c3);
}

function setNewBg(color){
    const colorPalette = generateColorPalette(color);

    c1 = colorPalette[2];
    c2 = colorPalette[3];
    c3 = colorPalette[4];
    console.log(colorPalette);

    changeGradient(c1, c2, c3);
}

function generateColorPalette(baseColor) {
    const colorPalette = [];
  
    // Variables pour les teintes plus foncées et plus claires
    const darkShade = 0.25;
    const lightShade = 0.75;
  
    // Conversion de la couleur de base en format RGB
    const baseColorRGB = hexToRgb(baseColor);
  
    // Calcul des teintes plus foncées
    const darkColor1 = shadeRGBColor(baseColorRGB, darkShade);
    const darkColor2 = shadeRGBColor(baseColorRGB, darkShade * 2);
    const darkColor3 = shadeRGBColor(baseColorRGB, darkShade * 3);
  
    // Calcul des teintes plus claires
    const lightColor1 = shadeRGBColor(baseColorRGB, lightShade);
    const lightColor2 = shadeRGBColor(baseColorRGB, lightShade * 2);
    const lightColor3 = shadeRGBColor(baseColorRGB, lightShade * 3);
  
    // Ajout des couleurs à la palette
    colorPalette.push("#" + rgbToHex(darkColor1), "#" +rgbToHex(darkColor2), "#" +rgbToHex(darkColor3));
    colorPalette.push(baseColor);
    colorPalette.push("#" +rgbToHex(lightColor1),"#" + rgbToHex(lightColor2), "#" +rgbToHex(lightColor3));
  
    return colorPalette;
  }
  
  // Fonction pour convertir un code hexadécimal en RGB
  function hexToRgb(hex) {
    let r = parseInt(hex.substring(0, 2), 16);
    let g = parseInt(hex.substring(2, 4), 16);
    let b = parseInt(hex.substring(4, 6), 16);
  
    return { r, g, b };
  }
  
  // Fonction pour convertir un RGB en code hexadécimal
  function rgbToHex(rgb) {
    let hex = ((1 << 24) + (rgb.r << 16) + (rgb.g << 8) + rgb.b).toString(16).slice(1);
  
    return hex;
  }
  
  // Fonction pour sombrer ou éclaircir une couleur RGB
  function shadeRGBColor(color, percent) {
    let t = percent < 0 ? 0 : 255;
    let p = percent < 0 ? percent * -1 : percent;
  
    let r = Math.round((t - color.r) * p) + color.r;
    let g = Math.round((t - color.g) * p) + color.g;
    let b = Math.round((t - color.b) * p) + color.b;
  
    return { r, g, b };
  }
  
