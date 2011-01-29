// THIS FILE HAS BEEN MINIFIED

if(typeof(RGraph) == 'undefined') RGraph = {isRGraph:true,type:'common'};RGraph.ZoomArea = function (obj)
{
if(obj.Get('chart.zoom.mode') == 'area'){
var canvas = obj.canvas;var context = obj.context;obj.canvas.style.cursor = 'crosshair';RGraph.Register(obj);canvas.onmousedown = function(e)
{
var canvas = e.target;var coords = RGraph.getMouseXY(e);var obj = canvas.__object__;if(RGraph.Registry.Get('chart.zoomed.area.div')){
RGraph.Registry.Get('chart.zoomed.area.div').style.display = 'none';}
if(typeof(RGraph.Registry.Get('chart.zoomed.area.divs')) == null){
RGraph.Registry.Set('chart.zoomed.area.divs', []);} else {
var divs = RGraph.Registry.Get('chart.zoomed.area.divs');if(divs && divs.length){
for (var i=0; i<divs.length; ++i){
if(divs[i]){
divs[i].style.display = 'none';divs[i] = null;}
}
}
}
var canvasXY = RGraph.getCanvasXY(canvas);var areaDiv = document.createElement('DIV');areaDiv.__canvas__ = canvas;areaDiv.style.position = 'absolute';areaDiv.style.left = canvasXY[0] + coords[0] + 'px'
areaDiv.style.top = canvasXY[1] + coords[1] + 'px'
areaDiv.style.width = 0;areaDiv.style.height = 0;areaDiv.style.border = '1px solid black';areaDiv.style.backgroundColor = 'rgba(220,220,220,0.3)';areaDiv.style.display = 'none';areaDiv.onmouseover = function (e)
{
setTimeout(function (){e.target.style.opacity = 0.8;}, 50);setTimeout(function (){e.target.style.opacity = 0.6;}, 100);setTimeout(function (){e.target.style.opacity = 0.4;}, 150);setTimeout(function (){e.target.style.opacity = 0.2;}, 200);setTimeout(function (){e.target.style.opacity = 0;}, 250);setTimeout(function (){e.target.style.display = 'none';}, 300);setTimeout(function (){e.target = null;}, 350);}
document.body.appendChild(areaDiv);RGraph.Registry.Set('chart.zoomed.area.div', null);RGraph.Registry.Set('chart.zoomed.area.mousedown', coords);RGraph.Registry.Set('chart.zoomed.area.areadiv', areaDiv);}
canvas.onmousemove = function (e)
{
var startCoords = RGraph.Registry.Get('chart.zoomed.area.mousedown');if(startCoords && startCoords.length){
var coords = RGraph.getMouseXY(e);var canvasXY = RGraph.getCanvasXY(e.target);var obj = e.target.__object__;var context = obj.context;var canvas = obj.canvas;var startx = startCoords[0];var starty = startCoords[1];var endx = coords[0];var endy = coords[1];var width = endx - startx;var height = endy - starty;var areaDiv = RGraph.Registry.Get('chart.zoomed.area.areadiv');if(width >= 0 && height >= 0){
if(width > 5 && height > 5){
areaDiv.style.width = (width - 15) + 'px';areaDiv.style.height = (height - 15) + 'px';areaDiv.style.display = 'inline';} else {
areaDiv.style.display = 'none';}
} else if(width < -5 || height < -5){
var canvasCoords = RGraph.getCanvasXY(canvas);var noticeDiv = document.createElement('DIV');noticeDiv.style.position = 'absolute';noticeDiv.style.top = 0;noticeDiv.style.left = 0;noticeDiv.style.zIndex = 99;noticeDiv.style.border = '1px dashed black';noticeDiv.style.backgroundColor = '#ffc1c1';noticeDiv.style.MozBoxShadow = '0 0 5px #999';noticeDiv.style.WebkitBoxShadow = '0 0 5px #999';noticeDiv.style.boxShadow = '0 0 5px #999';noticeDiv.style.padding = '2px';noticeDiv.innerHTML = 'Zoom goes right and down';document.body.appendChild(noticeDiv);noticeDiv.style.top = canvasCoords[1] + startCoords[1] - noticeDiv.offsetHeight + 'px';noticeDiv.style.left = canvasCoords[0] + startCoords[0] - (noticeDiv.offsetWidth / 2) + 'px';noticeDiv.style.width = noticeDiv.offsetWidth + 'px';setTimeout(function (){noticeDiv.style.opacity = 0.8;}, 2100);setTimeout(function (){noticeDiv.style.opacity = 0.6;}, 2200);setTimeout(function (){noticeDiv.style.opacity = 0.4;}, 2300);setTimeout(function (){noticeDiv.style.opacity = 0.2;}, 2400);setTimeout(function (){noticeDiv.style.display = 'none';}, 2500);setTimeout(function (){noticeDiv = null;}, 2600);}
}
}
canvas.onmouseup = function (e)
{
RGraph.FixEventObject(e);var startCoords = RGraph.Registry.Get('chart.zoomed.area.mousedown');var coords = RGraph.getMouseXY(e);if(RGraph.Registry.Get('chart.zoomed.area.mousedown')){
RGraph.Registry.Get('chart.zoomed.area.areadiv').style.display = 'none';RGraph.Registry.Get('chart.zoomed.area.areadiv').style.left = '-1000px';RGraph.Registry.Get('chart.zoomed.area.areadiv').style.top = '-1000px';RGraph.Registry.Set('chart.zoomed.area.areadiv', null);if(coords[0] < startCoords[0] || coords[1] < startCoords[1]){
RGraph.Registry.Set('chart.zoomed.area.mousedown', false);return;}
var canvas = e.target;var obj = canvas.__object__;var context = obj.context;var canvasCoords = RGraph.getCanvasXY(e.target);var coords = RGraph.getMouseXY(e);var startCoords = RGraph.Registry.Get('chart.zoomed.area.mousedown');var startx = startCoords[0];var starty = startCoords[1];var endx = coords[0] - 15;var endy = coords[1] - 15;var width = Math.abs(endx - startx);var height = Math.abs(endy - starty);var factor = obj.Get('chart.zoom.factor') - 1;var img = document.createElement('IMG');img.src = canvas.toDataURL();img.style.position = 'relative';img.style.left = (factor + 1) * -1 * startx + 'px';img.style.top = (factor + 1) * -1 * starty + 'px';img.width = (factor + 1) * canvas.width;img.height = (factor + 1) * canvas.height;var div = document.createElement('DIV');div.__object__ = obj;div.className = 'RGraph_zoomed_area';div.style.position = 'absolute';div.style.backgroundColor = 'white';div.style.cursor = 'move';div.style.top = e.pageY + 'px';div.style.left = e.pageX + 'px';div.origWidth = width;div.origHeight = height;div.style.width = width + 'px';div.style.height = height + 'px';div.style.border = '1px solid black';                    
div.style.boxShadow = '0 0 15px black';div.style.MozBoxShadow = '0 0 15px black';div.style.WebkitBoxShadow = '0 0 15px black';div.style.overflow = 'hidden';div.style.opacity = 0;div.style.zIndex = 99;document.body.appendChild(div);div.appendChild(img);div.ondblclick = function (event)
{
var event = RGraph.FixEventObject(event);var img = event.target;var div = event.target.parentNode;var current_width = div.offsetWidth
var current_height = div.offsetHeight
var target_width = img.offsetWidth;var target_height = img.offsetHeight;var diff_width = target_width - current_width;var diff_height = target_height - current_height;var img_offset_left = parseInt(img.offsetLeft);var img_offset_top = parseInt(img.offsetTop);
__zoomed_div_style__ = div.style;
__zoomed_img_style__ = img.style;setTimeout("__zoomed_div_style__.left = parseInt(__zoomed_div_style__.left) - " + (diff_width * 0.1) + " + 'px'", 50);setTimeout("__zoomed_div_style__.left = parseInt(__zoomed_div_style__.left) - " + (diff_width * 0.1) + " + 'px'", 100);setTimeout("__zoomed_div_style__.left = parseInt(__zoomed_div_style__.left) - " + (diff_width * 0.1) + " + 'px'", 150);setTimeout("__zoomed_div_style__.left = parseInt(__zoomed_div_style__.left) - " + (diff_width * 0.1) + " + 'px'", 200);setTimeout("__zoomed_div_style__.left = parseInt(__zoomed_div_style__.left) - " + (diff_width * 0.1) + " + 'px'", 250);setTimeout("__zoomed_div_style__.top = parseInt(__zoomed_div_style__.top) - " + (diff_height * 0.1) + " + 'px'", 50);setTimeout("__zoomed_div_style__.top = parseInt(__zoomed_div_style__.top) - " + (diff_height * 0.1) + " + 'px'", 100);setTimeout("__zoomed_div_style__.top = parseInt(__zoomed_div_style__.top) - " + (diff_height * 0.1) + " + 'px'", 150);setTimeout("__zoomed_div_style__.top = parseInt(__zoomed_div_style__.top) - " + (diff_height * 0.1) + " + 'px'", 200);setTimeout("__zoomed_div_style__.top = parseInt(__zoomed_div_style__.top) - " + (diff_height * 0.1) + " + 'px'", 250);setTimeout("__zoomed_div_style__.width = parseInt(__zoomed_div_style__.width) + " + (diff_width * 0.2) + " + 'px'", 50);setTimeout("__zoomed_div_style__.width = parseInt(__zoomed_div_style__.width) + " + (diff_width * 0.2) + " + 'px'", 100);setTimeout("__zoomed_div_style__.width = parseInt(__zoomed_div_style__.width) + " + (diff_width * 0.2) + " + 'px'", 150);setTimeout("__zoomed_div_style__.width = parseInt(__zoomed_div_style__.width) + " + (diff_width * 0.2) + " + 'px'", 200);setTimeout("__zoomed_div_style__.width = parseInt(__zoomed_div_style__.width) + " + (diff_width * 0.2) + " + 'px'", 250);setTimeout("__zoomed_div_style__.height = parseInt(__zoomed_div_style__.height) + " + (diff_height * 0.2) + " + 'px'", 50);setTimeout("__zoomed_div_style__.height = parseInt(__zoomed_div_style__.height) + " + (diff_height * 0.2) + " + 'px'", 100);setTimeout("__zoomed_div_style__.height = parseInt(__zoomed_div_style__.height) + " + (diff_height * 0.2) + " + 'px'", 150);setTimeout("__zoomed_div_style__.height = parseInt(__zoomed_div_style__.height) + " + (diff_height * 0.2) + " + 'px'", 200);setTimeout("__zoomed_div_style__.height = parseInt(__zoomed_div_style__.height) + " + (diff_height * 0.2) + " + 'px'", 250);setTimeout("__zoomed_img_style__.left = " + (img_offset_left * 0.8) + " + 'px'", 50);setTimeout("__zoomed_img_style__.left = " + (img_offset_left * 0.6) + " + 'px'", 100);setTimeout("__zoomed_img_style__.left = " + (img_offset_left * 0.4) + " + 'px'", 150);setTimeout("__zoomed_img_style__.left = " + (img_offset_left * 0.2) + " + 'px'", 200);setTimeout("__zoomed_img_style__.left = 0", 250);setTimeout("__zoomed_img_style__.top = " + (img_offset_top * 0.8) + " + 'px'", 50);setTimeout("__zoomed_img_style__.top = " + (img_offset_top * 0.6) + " + 'px'", 100);setTimeout("__zoomed_img_style__.top = " + (img_offset_top * 0.4) + " + 'px'", 150);setTimeout("__zoomed_img_style__.top = " + (img_offset_top * 0.2) + " + 'px'", 200);setTimeout("__zoomed_img_style__.top = 0", 250);div.ondblclick = null;}
div.onmousedown = function (e)
{
e = RGraph.FixEventObject(e);var div = e.target.parentNode;var img = div.childNodes[0];if(e.button == 0 || e.button == 1  ){
div.__offsetx__ = e.offsetX + img.offsetLeft;div.__offsety__ = e.offsetY + img.offsetTop;RGraph.Registry.Set('chart.mousedown', div);RGraph.Registry.Set('chart.button', 0);} else {
img.__startx__ = e.pageX;img.__starty__ = e.pageY;img.__originalx__ = img.offsetLeft;img.__originaly__ = img.offsetTop;RGraph.Registry.Set('chart.mousedown', img);RGraph.Registry.Set('chart.button', 2);window.oncontextmenu = function (e)
{
e = RGraph.FixEventObject(e);e.stopPropagation();window.oncontextmenu = function (e)
{
return true;}
return false;}
}
e.stopPropagation();return false;}
window.onmouseup = function (e)
{
RGraph.Registry.Set('chart.mousedown', false);}
window.onmousemove = function (e)
{
if(RGraph.Registry.Get('chart.mousedown') && RGraph.Registry.Get('chart.button') == 0){
var div = RGraph.Registry.Get('chart.mousedown');var x = e.pageX - div.__offsetx__;var y = e.pageY - div.__offsety__;div.style.left = x + 'px';div.style.top = y + 'px';} else if(RGraph.Registry.Get('chart.mousedown') && RGraph.Registry.Get('chart.button') == 2){
var img = RGraph.Registry.Get('chart.mousedown');var x = img.__originalx__ + e.pageX - img.__startx__;var y = img.__originaly__ + e.pageY - img.__starty__;img.style.left = x + 'px';img.style.top = y + 'px';}
}
var divs = RGraph.Registry.Get('chart.zoomed.area.divs');if(typeof(divs) == 'object'){
divs.push(div);} else {
RGraph.Registry.Set('chart.zoomed.area.divs', [div])
}
var bg = document.createElement('DIV');bg.style.position = 'fixed'
bg.style.zIndex = 98;bg.style.top = 0;bg.style.left = 0;bg.style.backgroundColor = '#999';bg.style.opacity = 0;bg.style.width = (screen.width + 100) + 'px';bg.style.height = (screen.height + 100) + 'px';document.body.appendChild(bg);bg.onclick = function (e)
{
div.style.display = 'none';bg.style.display = 'none';div = null;bg = null;}
setTimeout(function (){div.style.opacity = 0.2;}, 50);setTimeout(function (){div.style.opacity = 0.4;}, 100);setTimeout(function (){div.style.opacity = 0.6;}, 150);setTimeout(function (){div.style.opacity = 0.8;}, 200);setTimeout(function (){div.style.opacity = 1.0;}, 250);setTimeout(function (){div.style.left = canvasCoords[0] + startx - (width * factor * 0.1) + 'px'}, 50);setTimeout(function (){div.style.left = canvasCoords[0] + startx - (width * factor * 0.2) + 'px'}, 100);setTimeout(function (){div.style.left = canvasCoords[0] + startx - (width * factor * 0.3) + 'px'}, 150);setTimeout(function (){div.style.left = canvasCoords[0] + startx - (width * factor * 0.4) + 'px'}, 200);setTimeout(function (){div.style.left = canvasCoords[0] + startx - (width * factor * 0.5) + 'px'}, 250);setTimeout(function (){div.style.top = canvasCoords[1] + starty - (height * factor * 0.1) + 'px'}, 50);setTimeout(function (){div.style.top = canvasCoords[1] + starty - (height * factor * 0.2) + 'px'}, 100);setTimeout(function (){div.style.top = canvasCoords[1] + starty - (height * factor * 0.3) + 'px'}, 150);setTimeout(function (){div.style.top = canvasCoords[1] + starty - (height * factor * 0.4) + 'px'}, 200);setTimeout(function (){div.style.top = canvasCoords[1] + starty - (height * factor * 0.5) + 'px'}, 250);setTimeout(function (){div.style.width = width + (width * factor * 0.2) + 'px'}, 50);setTimeout(function (){div.style.width = width + (width * factor * 0.4) + 'px'}, 100);setTimeout(function (){div.style.width = width + (width * factor * 0.6) + 'px'}, 150);setTimeout(function (){div.style.width = width + (width * factor * 0.8) + 'px'}, 200);setTimeout(function (){div.style.width = width + (width * factor * 1.0) + 'px'}, 250);setTimeout(function (){div.style.height = height + (height * factor * 0.2) + 'px'}, 50);setTimeout(function (){div.style.height = height + (height * factor * 0.4) + 'px'}, 100);setTimeout(function (){div.style.height = height + (height * factor * 0.6) + 'px'}, 150);setTimeout(function (){div.style.height = height + (height * factor * 0.8) + 'px'}, 200);setTimeout(function (){div.style.height = height + (height * factor * 1.0) + 'px'}, 250);setTimeout(function (){bg.style.opacity = 0.1;}, 50);setTimeout(function (){bg.style.opacity = 0.2;}, 100);setTimeout(function (){bg.style.opacity = 0.3;}, 150);setTimeout(function (){bg.style.opacity = 0.4;}, 200);setTimeout(function (){bg.style.opacity = 0.5;}, 250);RGraph.Registry.Set('chart.zoomed.area.bg', bg);RGraph.Registry.Set('chart.zoomed.area.img', img);RGraph.Registry.Set('chart.zoomed.area.div', div);RGraph.Registry.Set('chart.zoomed.area.mousedown', null);}
RGraph.FireCustomEvent(obj, 'onzoom');}
canvas.onmouseout = function (e)
{
RGraph.Registry.Set('chart.zoomed.area.areadiv', null);RGraph.Registry.Set('chart.zoomed.area.mousedown', null);RGraph.Registry.Set('chart.zoomed.area.div', null);}
}
}
RGraph.ShowZoomWindow = function (obj)
{
var gutter = obj.Get('chart.gutter');if(obj.Get('chart.zoom.mode') == 'thumbnail'){
RGraph.ZoomWindow(obj.canvas);}
if(obj.Get('chart.zoom.mode') == 'area'){
RGraph.ZoomArea(obj);}
}
RGraph.ZoomWindow = function (canvas)
{
canvas.onmousemove = function (e)
{
e = RGraph.FixEventObject(e);var obj = e.target.__object__;var canvas = obj.canvas;var context = obj.context;var coords = RGraph.getMouseXY(e);if(!RGraph.Registry.Get('chart.zoomed.div')){
var div = document.createElement('div');div.className = 'RGraph_zoom_window';div.style.width = obj.Get('chart.zoom.thumbnail.width') + 'px';div.style.height = obj.Get('chart.zoom.thumbnail.height') + 'px';div.style.border = '2px dashed gray';div.style.position = 'absolute';div.style.overflow = 'hidden';div.style.backgroundColor = 'white';div.style.left = '-1000px';div.style.top = '-1000px';div.style.borderRadius = '5px';div.style.MozBorderRadius = '5px';div.style.WebkitBorderRadius = '5px';if(obj.Get('chart.zoom.shadow')){
div.style.boxShadow = 'rgba(0,0,0,0.5) 3px 3px 3px';div.style.MozBoxShadow = 'rgba(0,0,0,0.5) 3px 3px 3px';div.style.WebkitBoxShadow = 'rgba(0,0,0,0.5) 3px 3px 3px';}
div.__object__ = obj;document.body.appendChild(div);var img = document.createElement('img');img.width = obj.canvas.width * obj.Get('chart.zoom.factor');img.height = obj.canvas.height * obj.Get('chart.zoom.factor');img.style.position = 'relative';img.style.backgroundColor = 'white';img.__object__ = obj;div.appendChild(img);RGraph.Registry.Set('chart.zoomed.div', div);RGraph.Registry.Set('chart.zoomed.img', img);setTimeout("RGraph.Registry.Get('chart.zoomed.div').__object__.canvas.onmouseover()", 5);} else {
div = RGraph.Registry.Get('chart.zoomed.div');img = RGraph.Registry.Get('chart.zoomed.img');}
img.src = canvas.toDataURL();if(div && div.style.opacity < 1){
setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.opacity = 1", 400);}
var c = RGraph.getCanvasXY(obj.canvas);var x = c[0];var y = c[1];var offset = 7;div.style.left = (e.pageX - obj.Get('chart.zoom.thumbnail.width') - offset) + 'px';div.style.top = (e.pageY -  obj.Get('chart.zoom.thumbnail.height') - offset) + 'px';var l = (obj.Get('chart.zoom.thumbnail.width') / 2) - (coords[0] * obj.Get('chart.zoom.factor'));var t = (obj.Get('chart.zoom.thumbnail.height') / 2) - (coords[1] * obj.Get('chart.zoom.factor'));img.style.left = (l + ((obj.Get('chart.zoom.thumbnail.width') / 2) * obj.Get('chart.zoom.factor'))) + 'px';img.style.top = (t + ((obj.Get('chart.zoom.thumbnail.height') / 2) * obj.Get('chart.zoom.factor'))) + 'px';RGraph.FireCustomEvent(obj, 'onzoom');}
canvas.onmouseover = function (e)
{
var div = RGraph.Registry.Get('chart.zoomed.div');if(!div) return;var obj = div.__object__;var targetWidth = obj.Get('chart.zoom.thumbnail.width');var targetHeight = obj.Get('chart.zoom.thumbnail.height');div.style.width = 0;div.style.height = 0;if(obj.Get('chart.zoom.fade.in')){
RGraph.Registry.Get('chart.zoomed.div').style.opacity = 0.2;setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.opacity = 0.4", 100);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.opacity = 0.6", 200);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.opacity = 0.8", 300);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.opacity = 1", 400);} else {
setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.opacity = 1", 1);}
setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.width = '" + (targetWidth * (1/5) ) + "px'", 75);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.width = '" + (targetWidth * (2/5) ) + "px'", 150);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.width = '" + (targetWidth * (3/5) ) + "px'", 225);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.width = '" + (targetWidth * (4/5) ) + "px'", 300);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.width = '" + (targetWidth * (5/5) ) + "px'", 325);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.height = '" + (targetHeight * (1/5) ) + "px'", 75);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.height = '" + (targetHeight * (2/5) ) + "px'", 150);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.height = '" + (targetHeight * (3/5) ) + "px'", 225);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.height = '" + (targetHeight * (4/5) ) + "px'", 300);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.height = '" + (targetHeight * (5/5) ) + "px'", 375);}
canvas.onmouseout = function (e)
{
if(RGraph.Registry.Get('chart.zoomed.div') && RGraph.Registry.Get('chart.zoomed.div').__object__.Get('chart.zoom.fade.out')){
RGraph.Registry.Get('chart.zoomed.div').style.opacity = 0.8;setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.opacity = 0.6", 100);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.opacity = 0.4", 200);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.opacity = 0.2", 300);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.opacity = 0", 400);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.left = '-400px'", 400);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.top = '-400px'", 400);} else {
if(RGraph.Registry.Get('chart.zoomed.div')){
setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.left = '-400px'", 1);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.top = '-400px'", 41);}            }
}
}
RGraph.Zoom = function (e)
{
e = RGraph.FixEventObject(e);if(e && e.target && e.target.__canvas__){
var canvas = e.target.__canvas__;}
if(!canvas){
var registry_canvas = RGraph.Registry.Get('chart.contextmenu').__canvas__;if(registry_canvas){
var canvas = registry_canvas;}
}
var context = canvas.getContext('2d');var obj = canvas.__object__;var dataurl = canvas.toDataURL();var tmp = canvas;var coords = RGraph.getCanvasXY(canvas);var factor = obj.Get('chart.zoom.factor') - 1;var x = coords[0];var y = coords[1];var img = document.createElement('img');img.className = 'RGraph_zoomed_canvas';img.style.border = '3px solid gray';img.style.width = canvas.width + 'px';img.style.height = canvas.height + 'px';img.style.position = 'absolute';img.style.left = x + 'px';img.style.top = y + 'px';img.style.backgroundColor = 'white';img.style.opacity = obj.Get('chart.zoom.fade.in') ? 0 : 1;img.style.zIndex = 99;img.src = dataurl;document.body.appendChild(img);
__zoomedimage__ = img;
__zoomedimage__.obj = obj;img.onclick = function (e)
{
e = RGraph.FixEventObject(e);e.stopPropagation();return false;}
setTimeout(function (){window.onclick = RGraph.HideZoomedCanvas;}, 1);var width = parseInt(canvas.width);var height = parseInt(canvas.height);var frames = obj.Get('chart.zoom.frames');var delay = obj.Get('chart.zoom.delay');if(obj.Get('chart.zoom.hdir') == 'center'){
for (var i=1; i<=frames; ++i){
var newWidth = width * factor * (i/frames) + width;var rightHandEdge = x + canvas.width;var newLeft = (x + (canvas.width / 2)) - (newWidth / 2);setTimeout("__zoomedimage__.style.width = '" + String(newWidth) + "px'; __zoomedimage__.style.left = '" + newLeft + "px'", i * delay);}
} else if(obj.Get('chart.zoom.hdir') == 'left'){
for (var i=1; i<=frames; ++i){
var newWidth = width * factor * (i/frames) + width;var rightHandEdge = x + canvas.width;var newLeft = rightHandEdge - newWidth;setTimeout("__zoomedimage__.style.width = '" + String(newWidth) + "px'; __zoomedimage__.style.left = '" + newLeft + "px'", i * delay);}
} else {
for (var i=1; i<=frames; ++i){
var newWidth = width * factor * (i/frames) + width;setTimeout("__zoomedimage__.style.width = '" + String(newWidth) + "px'", i * delay);}
}
if(obj.Get('chart.zoom.vdir') == 'up'){
for (var i=1; i<=frames; ++i){
var newHeight = (height * factor * (i/frames)) + height;var bottomEdge = y + canvas.height;var newTop = bottomEdge - newHeight;setTimeout("__zoomedimage__.style.height = '" + String(newHeight) + "px'; __zoomedimage__.style.top = '" + newTop + "px'", i * delay);}
} else if(obj.Get('chart.zoom.vdir') == 'center'){
for (var i=1; i<=frames; ++i){
var newHeight = (height * factor * (i/frames)) + height;var bottomEdge = (y + (canvas.height / 2)) + (newHeight / 2);var newTop = bottomEdge - newHeight;setTimeout("__zoomedimage__.style.height = '" + String(newHeight) + "px'; __zoomedimage__.style.top = '" + newTop + "px'", i * delay);}
} else {
for (var i=1; i<=frames; ++i){
setTimeout("__zoomedimage__.style.height = '" + String(height * factor * (i/frames) + height) + "px'", i * delay);}
}
if(obj.Get('chart.zoom.fade.in')){
for (var i=1; i<=frames; ++i){
setTimeout("__zoomedimage__.style.opacity = " + String(i / frames), i * delay);}
}
if(obj.Get('chart.zoom.shadow')){
for (var i=1; i<=frames; ++i){
setTimeout("__zoomedimage__.style.boxShadow = 'rgba(128,128,128," + Number(i / frames) / 2 + ") 0 0 15px'", i * delay);setTimeout("__zoomedimage__.style.MozBoxShadow = 'rgba(128,128,128," + Number(i / frames) / 2 + ") 0 0 15px'", i * delay);setTimeout("__zoomedimage__.style.WebkitBoxShadow = 'rgba(128,128,128," + Number(i / frames) / 2 + ") 0 0 15px'", i * delay);}
}
canvas.onmouseout = function (e)
{
if(RGraph.Registry.Get('chart.zoomed.div') && RGraph.Registry.Get('chart.zoomed.div').__object__.Get('chart.zoom.fade.out')){
RGraph.Registry.Get('chart.zoomed.div').style.opacity = 0.8;setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.opacity = 0.6", 100);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.opacity = 0.4", 200);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.opacity = 0.2", 300);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.opacity = 0", 400);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.left = '-400px'", 400);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.top = '-400px'", 400);} else {
if(RGraph.Registry.Get('chart.zoomed.div')){
setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.left = '-400px'", 1);setTimeout("RGraph.Registry.Get('chart.zoomed.div').style.top = '-400px'", 1);}
}
}
if(obj.Get('chart.zoom.background')){
var div = document.createElement('DIV');div.style.backgroundColor = '#999';div.style.opacity = 0;div.style.position = 'fixed';div.style.top = 0;div.style.left = 0;div.style.width = (screen.width + 100) + 'px';div.style.height = (screen.height + 100) + 'px';div.style.zIndex = 98;div.oncontextmenu = function (e)
{
return RGraph.HideZoomedCanvas(e);}
div.origHeight = div.style.height;document.body.appendChild(div);
__zoomedbackground__ = div;for (var i=1; i<=frames; ++i){
setTimeout("__zoomedbackground__.style.opacity = " + (Number(i / frames) * 0.5), i * delay);}
}
RGraph.FireCustomEvent(obj, 'onzoom');}
