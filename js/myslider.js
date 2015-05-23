var x;
x = $(document);
x.ready(inicializar);

function inicializar()
{
	$("#sli-nextLinkbtn").on("click", siguiente);
	$("#sli-previousLinkbtn").on("click", anterior);
}

function siguiente(e)
{
	var currentActiveImage = $(".image-shown");
	var nextActiveImage = currentActiveImage.next();
	
	if(nextActiveImage.length == 0)
	{
		nextActiveImage = $("#slider-items img").first();
	}
	
	currentActiveImage.removeClass("image-shown")
					  .addClass("image-hidden")
					  .css("z-index", -10);
					  
	nextActiveImage.addClass("image-shown")
				   .removeClass("image-hidden")
				   .css("z-index", 20);	
	
	$("#slider-items img").not([currentActiveImage, nextActiveImage]).css("z-index", -1);
	
	e.preventDefault();
}

function anterior(e)
{
	var currentActiveImage = $(".image-shown");
	var nextActiveImage = currentActiveImage.prev();
	
	if(nextActiveImage.length == 0)
	{
		nextActiveImage = $("#slider-items img").last();
	}
	
	currentActiveImage.removeClass("image-shown")
					  .addClass("image-hidden")
					  .css("z-index", -10);
					  
	nextActiveImage.addClass("image-shown")
				   .removeClass("image-hidden")
				   .css("z-index", 20);	
	
	$("#slider-items img").not([currentActiveImage, nextActiveImage]).css("z-index", -1);
	
	e.preventDefault();
}