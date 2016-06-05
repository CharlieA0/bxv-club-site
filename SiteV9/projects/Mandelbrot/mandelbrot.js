

//Globals

var canvas = document.getElementById("canvas"); 	//Store the canvas and it's context so we can draw on it.
var ctx = canvas.getContext("2d");

var z = 0, zi = 0, c = 0, ci = 0;	//Complex numbers for function

//Adjustable Parameters
const DEFAULT_REAL_RANGE = 2.5; 		//[-2.5, 2.5]
const DEFAULT_IMAGINARY_RANGE = 2.5		//[-2.5i, 2.5i]

const REAL_TRANSFORM = canvas.width / (2 * DEFAULT_REAL_RANGE);
const IMAG_TRANSFORM = canvas.height / (2 * DEFAULT_IMAGINARY_RANGE); 

const MAX_ITERATIONS = 100;

function drawMandelbrot() {

	//Create image
	var imageData = ctx.createImageData(canvas.width, canvas.height);

	//Create boolean (true/false statement) to remember if the function is bounded
	var unbounded = false;

	//For each point/pixel (x,y)
	for(var x = 0; x < canvas.width; x++) {
		for(var y = 0; y < canvas.height; y++) {

			//Transform Coordinates to Real Imaginary Plane
			c = (x - DEFAULT_REAL_RANGE) * REAL_TRANSFORM;
			ci = (y - DEFAULT_IMAGINARY_RANGE) * IMAG_TRANSFORM;

			//Calculate recursive Mandelbrot function and check if unbounded
			for(var i = 0; i < MAX_ITERATIONS; i++) {
				
				z = z * z - zi * zi + c;	//Real Part (Remember FOIL)
				zi = 2 * zi * z + ci; 		//imaginary part (Remember FOIL)

				//If (Z + Zi) ^ 2 is greater than 2 ^ 2, the function is unbounded
				if(z * z + zi * zi > 4) {	 
					unbounded = true;

					//Color the current pixel black
					var currentPixel = x * canvas.height + y;
					imageData.data[currentPixel + 0]=255;
  					imageData.data[currentPixel + 1]=255;
  					imageData.data[currentPixel + 2]=255;
  					imageData.data[currentPixel + 3]=255;
  					break;	//exit loop
				}

			}

			//if not unbounded
			if(!unbounded) {
				//Color the current pixel white
				var currentPixel = x * canvas.height + y;
				imageData.data[currentPixel + 0]=0;
  				imageData.data[currentPixel + 1]=0;
  				imageData.data[currentPixel + 2]=0;
  				imageData.data[currentPixel + 3]=255;
			}
		}
	}

	//Add image to screen
	ctx.putImageData(imageData, 0, 0);

}

function calculatePoint(z, zi, c, ci) {

	for(var i = 0; i < MAX_ITERATIONS; i++) {

		z = Z * Z - Zi * Zi + C;	//Real Part
		zi = 2 * Zi * Z + Ci; 		//imaginary part

		if(z * z + zi * zi > 4) {	//If (Z + Zi)^2 is greater than 2^2, the function is unbounded
			imageData.data[i+0]=0;
  			imageData.data[i+1]=0;
  			imageData.data[i+2]=0;
  			imageData.data[i+3]=255;
		}
	}
}

drawMandelbrot();