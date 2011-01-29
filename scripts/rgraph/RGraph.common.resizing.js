// THIS FILE HAS BEEN MINIFIED

if(typeof(RGraph) == 'undefined') RGraph = {isRGraph:true,type:'common'};
__rgraph_resizing_preserve_css_properties__ = [];RGraph.AllowResizing = function (obj)
{
if(obj.Get('chart.resizable')){
var canvas = obj.canvas;var context = obj.context;var resizeHandle = 15;RGraph.Resizing.canvas = canvas;if(!canvas.__original_width__ && !canvas.__original_height__){
canvas.__original_width__ = canvas.width;canvas.__original_height__ = canvas.height;}
var adjustX = (typeof(obj.Get('chart.resize.handle.adjust')) == 'object' && typeof(obj.Get('chart.resize.handle.adjust')[0]) == 'number' ? obj.Get('chart.resize.handle.adjust')[0] : 0);var adjustY = (typeof(obj.Get('chart.resize.handle.adjust')) == 'object' && typeof(obj.Get('chart.resize.handle.adjust')[1]) == 'number' ? obj.Get('chart.resize.handle.adjust')[1] : 0);var textWidth = context.measureText('Reset').width + 2;var bgcolor = obj.Get('chart.resize.handle.background');if(!bgcolor){
bgcolor = 'rgba(0,0,0,0)';}
context.beginPath();context.fillStyle = bgcolor;context.moveTo(canvas.width - resizeHandle - resizeHandle + adjustX, canvas.height - resizeHandle);context.fillRect(canvas.width - resizeHandle - resizeHandle + adjustX, canvas.height - resizeHandle + adjustY, 2 * resizeHandle, resizeHandle);context.fill();obj.context.beginPath();obj.context.strokeStyle = 'gray';obj.context.fillStyle = 'rgba(0,0,0,0)';obj.context.lineWidth = 1;obj.context.fillRect(obj.canvas.width - resizeHandle + adjustX, obj.canvas.height - resizeHandle - 2 + adjustY, resizeHandle, resizeHandle + 2);obj.context.fillRect(obj.canvas.width - resizeHandle - textWidth + adjustX, obj.canvas.height - resizeHandle + adjustY, resizeHandle + textWidth, resizeHandle + 2);obj.context.moveTo(obj.canvas.width - (resizeHandle / 2) + adjustX, obj.canvas.height - resizeHandle + adjustY);obj.context.lineTo(obj.canvas.width - (resizeHandle / 2) + adjustX, obj.canvas.height + adjustY);obj.context.moveTo(obj.canvas.width + adjustX, obj.canvas.height - (resizeHandle / 2) + adjustY);obj.context.lineTo(obj.canvas.width - resizeHandle + adjustX, obj.canvas.height - (resizeHandle / 2) + adjustY);context.fill();context.stroke();context.fillStyle = 'gray';context.beginPath();context.moveTo(canvas.width - (resizeHandle / 2) + adjustX, canvas.height - resizeHandle + adjustY);context.lineTo(canvas.width - (resizeHandle / 2) + 3 + adjustX, canvas.height - resizeHandle + 3 + adjustY);context.lineTo(canvas.width - (resizeHandle / 2) - 3 + adjustX, canvas.height - resizeHandle + 3 + adjustY);context.closePath();context.fill();context.beginPath();context.moveTo(canvas.width - (resizeHandle / 2) + adjustX, canvas.height + adjustY);context.lineTo(canvas.width - (resizeHandle / 2) + 3 + adjustX, canvas.height - 3 + adjustY);context.lineTo(canvas.width - (resizeHandle / 2) - 3 + adjustX, canvas.height - 3 + adjustY);context.closePath();context.fill();context.beginPath();context.moveTo(canvas.width - resizeHandle + adjustX, canvas.height - (resizeHandle / 2) + adjustY);context.lineTo(canvas.width - resizeHandle + 3 + adjustX, canvas.height - (resizeHandle / 2) + 3 + adjustY);context.lineTo(canvas.width - resizeHandle + 3 + adjustX, canvas.height - (resizeHandle / 2) - 3 + adjustY);context.closePath();context.fill();context.beginPath();context.moveTo(canvas.width + adjustX, canvas.height - (resizeHandle / 2) + adjustY);context.lineTo(canvas.width - 3 + adjustX, canvas.height - (resizeHandle / 2) + 3 + adjustY);context.lineTo(canvas.width  - 3 + adjustX, canvas.height - (resizeHandle / 2) - 3 + adjustY);context.closePath();context.fill();context.beginPath();context.fillStyle = 'white';context.moveTo(canvas.width + adjustX, canvas.height - (resizeHandle / 2) + adjustY);context.strokeRect(canvas.width - (resizeHandle / 2) - 2 + adjustX, canvas.height - (resizeHandle / 2) - 2 + adjustY, 4, 4);context.fillRect(canvas.width - (resizeHandle / 2) - 2 + adjustX, canvas.height - (resizeHandle / 2) - 2 + adjustY, 4, 4);context.fill();context.stroke();context.beginPath();context.fillStyle = 'gray';context.moveTo(canvas.width - resizeHandle - 3 + adjustX, canvas.height - resizeHandle / 2 + adjustY);context.lineTo(canvas.width - resizeHandle - resizeHandle + adjustX, canvas.height - (resizeHandle / 2) + adjustY);context.lineTo(canvas.width - resizeHandle - resizeHandle + 2 + adjustX, canvas.height - (resizeHandle / 2) - 2 + adjustY);context.lineTo(canvas.width - resizeHandle - resizeHandle + 2 + adjustX, canvas.height - (resizeHandle / 2) + 2 + adjustY);context.lineTo(canvas.width - resizeHandle - resizeHandle + adjustX, canvas.height - (resizeHandle / 2) + adjustY);context.stroke();context.fill();context.beginPath();context.moveTo(canvas.width - resizeHandle - resizeHandle - 1 + adjustX, canvas.height - (resizeHandle / 2) - 3 + adjustY);context.lineTo(canvas.width - resizeHandle - resizeHandle - 1 + adjustX, canvas.height - (resizeHandle / 2) + 3 + adjustY);context.stroke();context.fill();var window_onmousemove = function (e)
{
e = RGraph.FixEventObject(e);var canvas = RGraph.Resizing.canvas;var newWidth = RGraph.Resizing.originalw - (RGraph.Resizing.originalx - e.pageX);var newHeight = RGraph.Resizing.originalh - (RGraph.Resizing.originaly - e.pageY);if(RGraph.Resizing.mousedown){
if(newWidth > (canvas.__original_width__ / 2)) RGraph.Resizing.div.style.width = newWidth + 'px';if(newHeight > (canvas.__original_height__ / 2)) RGraph.Resizing.div.style.height = newHeight + 'px';RGraph.FireCustomEvent(canvas.__object__, 'onresize');}
}
window.addEventListener('mousemove', window_onmousemove, false);RGraph.AddEventListener(canvas.id, 'window_mousemove', window_onmousemove);var MouseupFunc = function (e)
{
if(!RGraph.Resizing || !RGraph.Resizing.div || !RGraph.Resizing.mousedown){
return;}
if(RGraph.Resizing.div){
var div = RGraph.Resizing.div;var canvas = div.__canvas__;var coords = RGraph.getCanvasXY(div.__canvas__);var parentNode = canvas.parentNode;if(canvas.style.position != 'absolute'){
var placeHolderDIV = document.createElement('DIV');placeHolderDIV.style.width = RGraph.Resizing.originalw + 'px';placeHolderDIV.style.height = RGraph.Resizing.originalh + 'px';placeHolderDIV.style.display = 'inline-block';placeHolderDIV.style.position = canvas.style.position;placeHolderDIV.style.left = canvas.style.left;placeHolderDIV.style.top = canvas.style.top;placeHolderDIV.style.cssFloat = canvas.style.cssFloat;parentNode.insertBefore(placeHolderDIV, canvas);}
canvas.style.backgroundColor = 'white';canvas.style.position = 'absolute';canvas.style.border = '1px dashed gray';canvas.style.left = (RGraph.Resizing.originalCanvasX  - 1) + 'px';canvas.style.top = (RGraph.Resizing.originalCanvasY - 1) + 'px';canvas.width = parseInt(div.style.width);canvas.height = parseInt(div.style.height);RGraph.FireCustomEvent(canvas.__object__, 'onresizebeforedraw');canvas.__object__.Draw();RGraph.Resizing.mousedown = false;div.style.left = '-1000px';div.style.top = '-1000px';}
RGraph.FireCustomEvent(canvas.__object__, 'onresizeend');}
var window_onmouseup = MouseupFunc;window.addEventListener('onmouseup', window_onmouseup, false);RGraph.AddEventListener(canvas.id, 'window_mouseup', window_onmouseup);var canvas_onmousemove = function (e)
{
e = RGraph.FixEventObject(e);var coords = RGraph.getMouseXY(e);var canvas = e.target;var context = canvas.getContext('2d');var orig_cursor = canvas.style.cursor;RGraph.Resizing.title = canvas.title;if(   (coords[0] > (canvas.width - resizeHandle)
&& coords[0] < canvas.width
&& coords[1] > (canvas.height - resizeHandle)
&& coords[1] < canvas.height)){
canvas.title = 'Resize the graph';canvas.style.cursor = 'move';} else if(   coords[0] > (canvas.width - resizeHandle - resizeHandle)
&& coords[0] < canvas.width - resizeHandle
&& coords[1] > (canvas.height - resizeHandle)
&& coords[1] < canvas.height){
canvas.style.cursor = 'pointer';canvas.title = 'Reset graph to original size';} else {
canvas.style.cursor = orig_cursor;;canvas.title = '';}
}
canvas.addEventListener('mousemove', canvas_onmousemove, false);RGraph.AddEventListener(canvas.id, 'mousemove', canvas_onmousemove);var canvas_onmousedown = function (e)
{
e = RGraph.FixEventObject(e);var coords = RGraph.getMouseXY(e);var canvasCoords = RGraph.getCanvasXY(e.target);if(   coords[0] > (obj.canvas.width - resizeHandle)
&& coords[0] < obj.canvas.width
&& coords[1] > (obj.canvas.height - resizeHandle)
&& coords[1] < obj.canvas.height){
RGraph.FireCustomEvent(obj, 'onresizebegin');RGraph.Resizing.mousedown = true;var div = document.createElement('DIV');div.style.position = 'absolute';div.style.left = canvasCoords[0] + 'px';div.style.top = canvasCoords[1] + 'px';div.style.width = canvas.width + 'px';div.style.height = canvas.height + 'px';div.style.border = '1px dotted black';div.style.backgroundColor = 'gray';div.style.opacity = 0.5;div.__canvas__ = e.target;document.body.appendChild(div);RGraph.Resizing.div = div;div.onmouseup = function (e)
{
MouseupFunc(e);}
RGraph.Resizing.div.onmouseover = function (e)
{
e = RGraph.FixEventObject(e);e.stopPropagation();}
RGraph.Resizing.originalx = e.pageX;RGraph.Resizing.originaly = e.pageY;RGraph.Resizing.originalw = obj.canvas.width;RGraph.Resizing.originalh = obj.canvas.height;RGraph.Resizing.originalCanvasX = RGraph.getCanvasXY(obj.canvas)[0];RGraph.Resizing.originalCanvasY = RGraph.getCanvasXY(obj.canvas)[1];}
if(   coords[0] > (canvas.width - resizeHandle - resizeHandle)
&& coords[0] < canvas.width - resizeHandle
&& coords[1] > (canvas.height - resizeHandle)
&& coords[1] < canvas.height){
RGraph.FireCustomEvent(canvas.__object__, 'onresizebegin');canvas.width = canvas.__original_width__;canvas.height = canvas.__original_height__;canvas.style.border = '';canvas.style.left = (parseInt(canvas.style.left)) + 'px';canvas.style.top = (parseInt(canvas.style.top)) + 'px';RGraph.FireCustomEvent(canvas.__object__, 'onresizebeforedraw');canvas.__object__.Draw();if(RGraph.Resizing.div){
RGraph.Resizing.div.style.width = canvas.__original_width__ + 'px';RGraph.Resizing.div.style.height = canvas.__original_height__ + 'px';}
RGraph.FireCustomEvent(canvas.__object__, 'onresize');RGraph.FireCustomEvent(canvas.__object__, 'onresizeend');}
}
canvas.addEventListener('mousedown', canvas_onmousedown, false);RGraph.AddEventListener(canvas.id, 'mousedown', canvas_onmousedown);}
}
