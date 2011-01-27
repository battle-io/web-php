// THIS FILE HAS BEEN MINIFIED

if(typeof(RGraph) == 'undefined') RGraph = {isRGraph:true,type:'common'};RGraph.Registry = {};RGraph.Registry.store = [];RGraph.Registry.store['chart.event.handlers'] = [];RGraph.background = {};RGraph.objects = [];RGraph.Resizing = {};RGraph.events = [];RGraph.getScale = function (max, obj)
{
if(max == 0){
return ['0.2', '0.4', '0.6', '0.8', '1.0'];}
var original_max = max;if(max <= 1){
if(max > 0.5){
return [0.2,0.4,0.6,0.8, Number(1).toFixed(1)];} else if(max >= 0.1){
return obj.Get('chart.scale.round') ? [0.2,0.4,0.6,0.8,1] : [0.1,0.2,0.3,0.4,0.5];} else {
var tmp = max;var exp = 0;while (tmp < 1.01){
exp += 1;tmp *= 10;}
var ret = ['2e-' + exp, '4e-' + exp, '6e-' + exp, '8e-' + exp, '10e-' + exp];if(max <= ('5e-' + exp)){
ret = ['1e-' + exp, '2e-' + exp, '3e-' + exp, '4e-' + exp, '5e-' + exp];}
return ret;}
}
if(String(max).indexOf('.') > 0){
max = String(max).replace(/\.\d+$/, '');}
var interval = Math.pow(10, Number(String(Number(max)).length - 1));var topValue = interval;while (topValue < max){
topValue += (interval / 2);}
if(Number(original_max) > Number(topValue)){
topValue += (interval / 2);}
if(max < 10){
topValue = (Number(original_max) <= 5 ? 5 : 10);}
if(obj && typeof(obj.Get('chart.scale.round')) == 'boolean' && obj.Get('chart.scale.round')){
topValue = 10 * interval;}
return [topValue * 0.2, topValue * 0.4, topValue * 0.6, topValue * 0.8, topValue];}
RGraph.array_max = function (arr)
{
var max = null;for (var i=0; i<arr.length; ++i){
if(typeof(arr[i]) == 'number'){
var val = arguments[1] ? Math.abs(arr[i]) : arr[i];if(typeof(max) == 'number'){
max = Math.max(max, val);} else {
max = val;}
}
}
return max;}
RGraph.array_pad = function (arr, len)
{
if(arr.length < len){
var val = arguments[2] ? arguments[2] : null;for (var i=arr.length; i<len; ++i){
arr[i] = val;}
}
return arr;}
RGraph.array_sum = function (arr)
{
if(typeof(arr) == 'number'){
return arr;}
var i, sum;var len = arr.length;for(i=0,sum=0;i<len;sum+=arr[i++]);return sum;}
RGraph.is_array = function (obj)
{
return obj != null && obj.constructor.toString().indexOf('Array') != -1;}
RGraph.degrees2Radians = function (degrees)
{
return degrees * (Math.PI / 180);}
RGraph.lineByAngle = function (context, x, y, angle, length)
{
context.arc(x, y, length, angle, angle, false);context.lineTo(x, y);context.arc(x, y, length, angle, angle, false);}
RGraph.Text = function (context, font, size, x, y, text)
{
if(typeof(text) == 'string' && text.match(/\r\n/)){
var arr = text.split('\r\n');text = arr[0];arr = RGraph.array_shift(arr);var nextline = arr.join('\r\n')
RGraph.Text(context, font, size, arguments[9] == -90 ? (x + (size * 1.5)) : x, y + (size * 1.5), nextline, arguments[6] ? arguments[6] : null, 'center', arguments[8], arguments[9], arguments[10], arguments[11], arguments[12]);}
if(RGraph.isIE8()){
y += 2;}
context.font = (arguments[11] ? 'Bold ': '') + size + 'pt ' + font;var i;var origX = x;var origY = y;var originalFillStyle = context.fillStyle;var originalLineWidth = context.lineWidth;if(typeof(arguments[6]) == null) arguments[6] = 'bottom';if(typeof(arguments[7]) == null) arguments[7] = 'left';if(typeof(arguments[8]) == null) arguments[8] = null;if(typeof(arguments[9]) == null) arguments[9] = 0;if(typeof(arguments[12]) == null) arguments[12] = true;if(navigator.userAgent.indexOf('Opera') != -1){
context.canvas.__rgraph_valign__ = arguments[6];context.canvas.__rgraph_halign__ = arguments[7];}
context.save();context.canvas.__rgraph_originalx__ = x;context.canvas.__rgraph_originaly__ = y;context.translate(x, y);x = 0;y = 0;if(arguments[9]){
context.rotate(arguments[9] / 57.3);}
if(arguments[6]){
var vAlign = arguments[6];if(vAlign == 'center'){
context.translate(0, size / 2);} else if(vAlign == 'top'){
context.translate(0, size);}
}
if(arguments[7]){
var hAlign = arguments[7];var width = context.measureText(text).width;if(hAlign){
if(hAlign == 'center'){
context.translate(-1 * (width / 2), 0)
} else if(hAlign == 'right'){
context.translate(-1 * width, 0)
}
}
}
context.fillStyle = originalFillStyle;context.save();context.fillText(text,0,0);context.lineWidth = 0.5;if(arguments[8]){
var width = context.measureText(text).width;var ieOffset = RGraph.isIE8() ? 2 : 0;context.translate(x, y);context.strokeRect(0 - 3, 0 - 3 - size - ieOffset, width + 6, 0 + size + 6);if(arguments[10]){
var offset = 3;var ieOffset = RGraph.isIE8() ? 2 : 0;var width = context.measureText(text).width
context.fillStyle = arguments[10];context.fillRect(x - offset, y - size - offset - ieOffset, width + (2 * offset), size + (2 * offset));}
context.fillStyle = originalFillStyle;context.fillText(text,0,0);if(arguments[12]){
context.fillRect(
arguments[7] == 'left' ? 0 : (arguments[7] == 'center' ? width / 2 : width ) - 2,
arguments[6] == 'bottom' ? 0 : (arguments[6] == 'center' ? (0 - size) / 2 : 0 - size) - 2,
4,
4
);}
}
context.restore();context.lineWidth = originalLineWidth;context.restore();}
RGraph.Clear = function (canvas)
{
var context = canvas.getContext('2d');if(arguments[1] && arguments[1] == 'transparent'){
context.fillStyle = 'rgba(0,0,0,0)';context.globalCompositeOperation = 'source-in';context = canvas.getContext('2d');context.beginPath();context.fillRect(-1000,-1000,canvas.width + 2000,canvas.height + 2000);context.fill();context.globalCompositeOperation = 'source-over';} else {
context.fillStyle = arguments[1] ? String(arguments[1]) : 'white';context = canvas.getContext('2d');context.beginPath();context.fillRect(-100000,-100000,canvas.width + 200000,canvas.height + 200000);context.fill();}
if(RGraph.ClearAnnotations){
RGraph.ClearAnnotations(canvas.id);}
}
RGraph.DrawTitle = function (canvas, text, gutter)
{
var obj = canvas.__object__;var context = canvas.getContext('2d');var size = arguments[4] ? arguments[4] : 12;var centerx = (arguments[3] ? arguments[3] : RGraph.GetWidth(obj) / 2);var keypos = obj.Get('chart.key.position');var vpos = gutter / 2;var hpos = obj.Get('chart.title.hpos');var bgcolor = obj.Get('chart.title.background');if(obj.type == 'bar' && obj.Get('chart.variant') == '3d'){
keypos = 'gutter';}
context.beginPath();context.fillStyle = obj.Get('chart.text.color') ? obj.Get('chart.text.color') : 'black';if(keypos && keypos != 'gutter'){
var vCenter = 'center';} else if(!keypos){
var vCenter = 'center';} else {
var vCenter = 'bottom';}
if(typeof(obj.Get('chart.title.vpos')) == 'number'){
vpos = obj.Get('chart.title.vpos') * gutter;}
if(typeof(hpos) == 'number'){
centerx = hpos * canvas.width;}
if(typeof(obj.Get('chart.title.color') != null)){
var oldColor = context.fillStyle
var newColor = obj.Get('chart.title.color')
context.fillStyle = newColor ? newColor : 'black';}
var font = obj.Get('chart.text.font');RGraph.Text(context, font, size, centerx, vpos, text, vCenter, 'center', bgcolor != null, null, bgcolor, true);context.fillStyle = oldColor;}
RGraph.getMouseXY = function (e)
{
var obj = (RGraph.isIE8() ? event.srcElement : e.target);var x;var y;if(RGraph.isIE8()) e = event;if(typeof(e.offsetX) == 'number' && typeof(e.offsetY) == 'number'){
x = e.offsetX;y = e.offsetY;} else {
x = 0;y = 0;while (obj != document.body && obj){
x += obj.offsetLeft;y += obj.offsetTop;obj = obj.offsetParent;}
x = e.pageX - x;y = e.pageY - y;}
return [x, y];}
RGraph.getCanvasXY = function (canvas)
{
var x = 0;var y = 0;var obj = canvas;do {
x += obj.offsetLeft;y += obj.offsetTop;obj = obj.offsetParent;} while (obj && obj.tagName.toLowerCase() != 'body');return [x, y];}
RGraph.Register = function (obj)
{
var key = obj.id + '_' + obj.type;RGraph.objects[key] = obj;}
RGraph.Redraw = function ()
{
for (i in RGraph.objects){
if(
typeof(i) == 'string'
&& typeof(RGraph.objects[i]) == 'object'
&& typeof(RGraph.objects[i].type) == 'string'
&& RGraph.objects[i].isRGraph)  {
if(!arguments[0] || arguments[0] != RGraph.objects[i].id){
RGraph.Clear(RGraph.objects[i].canvas, arguments[1] ? arguments[1] : null);RGraph.objects[i].Draw();}
}
}
}
RGraph.pr = function (obj)
{
var str = '';var indent = (arguments[2] ? arguments[2] : '');switch (typeof(obj)){
case 'number':
if(indent == ''){
str+= 'Number: '
}
str += String(obj);break;case 'string':
if(indent == ''){
str+= 'String (' + obj.length + '):'
}
str += '"' + String(obj) + '"';break;case 'object':
if(obj == null){
str += 'null';break;}
str += 'Object\n' + indent + '(\n';for (var i=0; i<obj.length; ++i){
str += indent + ' ' + i + ' => ' + RGraph.pr(obj[i], true, indent + '    ') + '\n';}
var str = str + indent + ')';break;case 'function':
str += obj;break;case 'boolean':
str += 'Boolean: ' + (obj ? 'true' : 'false');break;}
if(arguments[1]){
return str;} else {
alert(str);}
}
RGraph.Registry.Set = function (name, value)
{
RGraph.Registry.store[name] = value;return value;}
RGraph.Registry.Get = function (name)
{
return RGraph.Registry.store[name];}
RGraph.background.Draw = function (obj)
{
var canvas = obj.canvas;var context = obj.context;var height = 0;var gutter = obj.Get('chart.gutter');var variant = obj.Get('chart.variant');context.fillStyle = obj.Get('chart.text.color');if(variant == '3d'){
context.save();context.translate(10, -5);}
if(typeof(obj.Get('chart.title.xaxis')) == 'string' && obj.Get('chart.title.xaxis').length){
var size = obj.Get('chart.text.size');var font = obj.Get('chart.text.font');context.beginPath();RGraph.Text(context, font, size + 2, RGraph.GetWidth(obj) / 2, RGraph.GetHeight(obj) - (gutter * obj.Get('chart.title.xaxis.pos')), obj.Get('chart.title.xaxis'), 'center', 'center', false, false, false, true);context.fill();}
if(typeof(obj.Get('chart.title.yaxis')) == 'string' && obj.Get('chart.title.yaxis').length){
var size = obj.Get('chart.text.size');var font = obj.Get('chart.text.font');context.beginPath();RGraph.Text(context, font, size + 2, gutter * obj.Get('chart.title.yaxis.pos'), RGraph.GetHeight(obj) / 2, obj.Get('chart.title.yaxis'), 'center', 'center', false, 270, false, true);context.fill();}
obj.context.beginPath();context.fillStyle = obj.Get('chart.background.barcolor1');height = (RGraph.GetHeight(obj) - obj.Get('chart.gutter'));for (var i=gutter; i < height ; i+=80){
obj.context.fillRect(gutter, i, RGraph.GetWidth(obj) - (gutter * 2), Math.min(40, RGraph.GetHeight(obj) - gutter - i) );}
context.fillStyle = obj.Get('chart.background.barcolor2');height = (RGraph.GetHeight(obj) - gutter);for (var i= (40 + gutter); i < height; i+=80){
obj.context.fillRect(gutter, i, RGraph.GetWidth(obj) - (gutter * 2), i + 40 > (RGraph.GetHeight(obj) - gutter) ? RGraph.GetHeight(obj) - (gutter + i) : 40);}
context.stroke();if(obj.Get('chart.background.grid')){
if(obj.Get('chart.background.grid.autofit')){
var vsize = (RGraph.GetWidth(obj) - (2 * obj.Get('chart.gutter')) - (obj.type == 'gantt' ? 2 * obj.Get('chart.gutter') : 0)) / obj.Get('chart.background.grid.autofit.numvlines');var hsize = (RGraph.GetHeight(obj) - (2 * obj.Get('chart.gutter'))) / obj.Get('chart.background.grid.autofit.numhlines');obj.Set('chart.background.grid.vsize', vsize);obj.Set('chart.background.grid.hsize', hsize);}
context.beginPath();context.lineWidth = obj.Get('chart.background.grid.width') ? obj.Get('chart.background.grid.width') : 1;context.strokeStyle = obj.Get('chart.background.grid.color');if(obj.Get('chart.background.grid.hlines')){
height = (RGraph.GetHeight(obj) - gutter)
for (y=gutter; y < height; y+=obj.Get('chart.background.grid.hsize')){
context.moveTo(gutter, y);context.lineTo(RGraph.GetWidth(obj) - gutter, y);}
}
if(obj.Get('chart.background.grid.vlines')){
var width = (RGraph.GetWidth(obj) - gutter)
for (x=gutter + (obj.type == 'gantt' ? (2 * gutter) : 0); x<=width; x+=obj.Get('chart.background.grid.vsize')){
context.moveTo(x, gutter);context.lineTo(x, RGraph.GetHeight(obj) - gutter);}
}
if(obj.Get('chart.background.grid.border')){
context.strokeStyle = obj.Get('chart.background.grid.color');context.strokeRect(gutter, gutter, RGraph.GetWidth(obj) - (2 * gutter), RGraph.GetHeight(obj) - (2 * gutter));}
}
context.stroke();if(variant == '3d'){
context.restore();}
if( typeof(obj.Get('chart.title')) == 'string'){
if(obj.type == 'gantt'){
gutter /= 2;}
RGraph.DrawTitle(canvas, obj.Get('chart.title'), gutter, null, obj.Get('chart.text.size') + 2);}
context.stroke();}
RGraph.GetDays = function (obj)
{
var year = obj.getFullYear();var days = obj.getDate();var month = obj.getMonth();if(month == 0) return days;if(month >= 1) days += 31; 
if(month >= 2) days += 28;if(year >= 2008 && year % 4 == 0) days += 1;if(month >= 3) days += 31;if(month >= 4) days += 30;if(month >= 5) days += 31;if(month >= 6) days += 30;if(month >= 7) days += 31;if(month >= 8) days += 31;if(month >= 9) days += 30;if(month >= 10) days += 31;if(month >= 11) days += 30;return days;}
RGraph.DrawKey = function (obj, key, colors)
{
var canvas = obj.canvas;var context = obj.context;context.lineWidth = 1;context.beginPath();var keypos = obj.Get('chart.key.position');var textsize = obj.Get('chart.text.size');var gutter = obj.Get('chart.gutter');if(typeof(obj.Get('chart.key.vpos')) == 'number'){
obj.Set('chart.key.position.y', obj.Get('chart.key.vpos') * gutter);}
if(keypos && keypos == 'gutter'){
RGraph.DrawKey_gutter(obj, key, colors);} else if(keypos && keypos == 'graph'){
RGraph.DrawKey_graph(obj, key, colors);} else {
alert('[COMMON] (' + obj.id + ') Unknown key position: ' + keypos);}
}
RGraph.DrawKey_graph = function (obj, key, colors)
{
var canvas = obj.canvas;var context = obj.context;var text_size = typeof(obj.Get('chart.key.text.size')) == 'number' ? obj.Get('chart.key.text.size') : obj.Get('chart.text.size');var text_font = obj.Get('chart.text.font');var gutter = obj.Get('chart.gutter');var hpos = obj.Get('chart.yaxispos') == 'right' ? gutter + 10 : canvas.width - gutter - 10;var vpos = gutter + 10;var title = obj.Get('chart.title');var blob_size = text_size;var hmargin = 8;var vmargin = 4;var fillstyle = obj.Get('chart.key.background');var strokestyle = 'black';var height = 0;var width = 0;context.font = text_size + 'pt ' + obj.Get('chart.text.font');for (i=0; i<key.length; ++i){
width = Math.max(width, context.measureText(key[i]).width);}
width += 5;width += blob_size;width += 5;width += 5;width += 5;if(   obj.Get('chart.yaxispos') == 'left'
|| (obj.type == 'pie' && !obj.Get('chart.yaxispos'))
|| (obj.type == 'hbar' && !obj.Get('chart.yaxispos'))
|| (obj.type == 'hbar' && obj.Get('chart.yaxispos') == 'center')
|| (obj.type == 'rscatter' && !obj.Get('chart.yaxispos'))
|| (obj.type == 'tradar' && !obj.Get('chart.yaxispos'))
|| (obj.type == 'rose' && !obj.Get('chart.yaxispos'))
|| (obj.type == 'funnel' && !obj.Get('chart.yaxispos'))
|| (obj.type == 'vprogress' && !obj.Get('chart.yaxispos'))
|| (obj.type == 'hprogress' && !obj.Get('chart.yaxispos'))
){
hpos -= width;}
if(typeof(obj.Get('chart.key.position.x')) == 'number'){
hpos = obj.Get('chart.key.position.x');}
if(typeof(obj.Get('chart.key.position.y')) == 'number'){
vpos = obj.Get('chart.key.position.y');}
if(obj.Get('chart.key.shadow')){
context.shadowColor = obj.Get('chart.key.shadow.color');context.shadowBlur = obj.Get('chart.key.shadow.blur');context.shadowOffsetX = obj.Get('chart.key.shadow.offsetx');context.shadowOffsetY = obj.Get('chart.key.shadow.offsety');}
context.beginPath();context.fillStyle = obj.Get('chart.key.background');context.strokeStyle = 'black';if(arguments[3] != false){
context.lineWidth = obj.Get('chart.key.linewidth') ? obj.Get('chart.key.linewidth') : 1;if(obj.Get('chart.key.rounded') == true){
context.beginPath();context.strokeStyle = strokestyle;RGraph.strokedCurvyRect(context, hpos, vpos, width - 5, 5 + ( (text_size + 5) * key.length),4);context.stroke();context.fill();RGraph.NoShadow(obj);} else {
context.strokeRect(hpos, vpos, width - 5, 5 + ( (text_size + 5) * key.length));context.fillRect(hpos, vpos, width - 5, 5 + ( (text_size + 5) * key.length));}
}
RGraph.NoShadow(obj);context.beginPath();for (var i=key.length - 1; i>=0; i--){
var j = Number(i) + 1;if(obj.Get('chart.key.color.shape') == 'circle'){
context.beginPath();context.strokeStyle = 'rgba(0,0,0,0)';context.fillStyle = colors[i];context.arc(hpos + 5 + (blob_size / 2), vpos + (5 * j) + (text_size * j) - text_size + (blob_size / 2), blob_size / 2, 0, 6.26, 0);context.fill();} else if(obj.Get('chart.key.color.shape') == 'line'){
context.beginPath();context.strokeStyle = colors[i];context.moveTo(hpos + 5, vpos + (5 * j) + (text_size * j) - text_size + (blob_size / 2));context.lineTo(hpos + blob_size + 5, vpos + (5 * j) + (text_size * j) - text_size + (blob_size / 2));context.stroke();} else {
context.fillStyle =  colors[i];context.fillRect(hpos + 5, vpos + (5 * j) + (text_size * j) - text_size, text_size, text_size + 1);}
context.beginPath();context.fillStyle = 'black';RGraph.Text(context,
text_font,
text_size,
hpos + blob_size + 5 + 5,
vpos + (5 * j) + (text_size * j),
key[i]);}
context.fill();}
RGraph.DrawKey_gutter = function (obj, key, colors)
{
var canvas = obj.canvas;var context = obj.context;var text_size = typeof(obj.Get('chart.key.text.size')) == 'number' ? obj.Get('chart.key.text.size') : obj.Get('chart.text.size');var text_font = obj.Get('chart.text.font');var gutter = obj.Get('chart.gutter');var hpos = canvas.width / 2;var vpos = (gutter / 2) - 5;var title = obj.Get('chart.title');var blob_size = text_size;var hmargin = 8;var vmargin = 4;var fillstyle = obj.Get('chart.key.background');var strokestyle = 'black';var length = 0;context.font = text_size + 'pt ' + text_font;for (i=0; i<key.length; ++i){
length += hmargin;length += blob_size;length += hmargin;length += context.measureText(key[i]).width;}
length += hmargin;if(obj.type == 'pie'){
if(obj.Get('chart.align') == 'left'){
var hpos = obj.radius + obj.Get('chart.gutter');} else if(obj.Get('chart.align') == 'right'){
var hpos = obj.canvas.width - obj.radius - obj.Get('chart.gutter');} else {
hpos = canvas.width / 2;}
}
  
hpos -= (length / 2);if(typeof(obj.Get('chart.key.position.x')) == 'number'){
hpos = obj.Get('chart.key.position.x');}
if(typeof(obj.Get('chart.key.position.y')) == 'number'){
vpos = obj.Get('chart.key.position.y');}
if(obj.Get('chart.key.position.gutter.boxed')){
if(obj.Get('chart.key.shadow')){
context.shadowColor = obj.Get('chart.key.shadow.color');context.shadowBlur = obj.Get('chart.key.shadow.blur');context.shadowOffsetX = obj.Get('chart.key.shadow.offsetx');context.shadowOffsetY = obj.Get('chart.key.shadow.offsety');}
context.beginPath();context.fillStyle = fillstyle;context.strokeStyle = strokestyle;if(obj.Get('chart.key.rounded')){
RGraph.strokedCurvyRect(context, hpos, vpos - vmargin, length, text_size + vmargin + vmargin)
} else {
context.strokeRect(hpos, vpos - vmargin, length, text_size + vmargin + vmargin);context.fillRect(hpos, vpos - vmargin, length, text_size + vmargin + vmargin);}
context.stroke();context.fill();RGraph.NoShadow(obj);}
for (var i=0, pos=hpos; i<key.length; ++i){
pos += hmargin;if(obj.Get('chart.key.color.shape') =='line'){
context.beginPath();context.strokeStyle = colors[i];context.moveTo(pos, vpos + (blob_size / 2));context.lineTo(pos + blob_size, vpos + (blob_size / 2));context.stroke();} else if(obj.Get('chart.key.color.shape') == 'circle'){
context.beginPath();context.fillStyle = colors[i];context.moveTo(pos, vpos + (blob_size / 2));context.arc(pos + (blob_size / 2), vpos + (blob_size / 2), (blob_size / 2), 0, 6.28, 0);context.fill();} else {
context.beginPath();context.fillStyle = colors[i];context.fillRect(pos, vpos, blob_size, blob_size);context.fill();}
pos += blob_size;pos += hmargin;context.beginPath();context.fillStyle = 'black';RGraph.Text(context, text_font, text_size, pos, vpos + text_size - 1, key[i]);context.fill();pos += context.measureText(key[i]).width;}
}
function pd(variable)
{
RGraph.pr(variable);}
function p(variable)
{
RGraph.pr(variable);}
function cl (variable)
{
return console.log(variable);}
RGraph.array_clone = function (obj)
{
if(obj == null || typeof(obj) != 'object'){
return obj;}
var temp = [];for(var i=0;i<obj.length; ++i){
temp[i] = RGraph.array_clone(obj[i]);}
return temp;}
RGraph.array_reverse = function (arr)
{
var newarr = [];for (var i=arr.length - 1; i>=0; i--){
newarr.push(arr[i]);}
return newarr;}
RGraph.number_format = function (obj, num)
{
var i;var prepend = arguments[2] ? String(arguments[2]) : '';var append = arguments[3] ? String(arguments[3]) : '';var output = '';var decimal = '';var decimal_seperator = obj.Get('chart.scale.point') ? obj.Get('chart.scale.point') : '.';var thousand_seperator = obj.Get('chart.scale.thousand') ? obj.Get('chart.scale.thousand') : ',';RegExp.$1 = '';var i,j;if(String(num).indexOf('e') > 0){
return String(prepend + String(num) + append);}
num = String(num);if(num.indexOf('.') > 0){
num = num.replace(/\.(.*)/, '');decimal = RegExp.$1;}
var seperator = thousand_seperator;var foundPoint;for (i=(num.length - 1),j=0; i>=0; j++,i--){
var character = num.charAt(i);if( j % 3 == 0 && j != 0){
output += seperator;}
output += character;}
var rev = output;output = '';for (i=(rev.length - 1); i>=0; i--){
output += rev.charAt(i);}
output = output.replace(/^-,/, '-');if(decimal.length){
output =  output + decimal_seperator + decimal;decimal = '';RegExp.$1 = '';}
if(output.charAt(0) == '-'){
output *= -1;prepend = '-' + prepend;}
return prepend + output + append;}
RGraph.DrawBars = function (obj)
{
var hbars = obj.Get('chart.background.hbars');obj.context.beginPath();for (i=0; i<hbars.length; ++i){
if(hbars[i][1] == null){
hbars[i][1] = obj.max;} else if(hbars[i][0] + hbars[i][1] > obj.max){
hbars[i][1] = obj.max - hbars[i][0];}
if(Math.abs(hbars[i][1]) > obj.max){
hbars[i][1] = -1 * obj.max;}
if(Math.abs(hbars[i][0]) > obj.max){
hbars[i][0] = obj.max;}
if(hbars[i][0] + hbars[i][1] < (-1 * obj.max) ){
hbars[i][1] = -1 * (obj.max + hbars[i][0]);}
if(obj.Get('chart.xaxispos') == 'bottom' && (hbars[i][0] < 0 || (hbars[i][1] + hbars[i][1] < 0)) ){
alert('[' + obj.type.toUpperCase() + ' (ID: ' + obj.id + ') BACKGROUND HBARS] You have a negative value in one of your background hbars values, whilst the X axis is in the center');}
var ystart = (obj.grapharea - ((hbars[i][0] / obj.max) * obj.grapharea));var height = (Math.min(hbars[i][1], obj.max - hbars[i][0]) / obj.max) * obj.grapharea;if(obj.Get('chart.xaxispos') == 'center'){
ystart /= 2;height /= 2;}
ystart += obj.Get('chart.gutter')
var x = obj.Get('chart.gutter');var y = ystart - height;var w = obj.canvas.width - (2 * obj.Get('chart.gutter'));var h = height;if(navigator.userAgent.indexOf('Opera') != -1 && obj.Get('chart.xaxispos') == 'center' && h < 0){
h *= -1;y = y - h;}
obj.context.fillStyle = hbars[i][2];obj.context.fillRect(x, y, w, h);}
obj.context.fill();}
RGraph.DrawInGraphLabels = function (obj)
{
var canvas = obj.canvas;var context = obj.context;var labels = obj.Get('chart.labels.ingraph');var labels_processed = [];var fgcolor = 'black';var bgcolor = 'white';var direction = 1;if(!labels){
return;}
for (var i=0; i<labels.length; ++i){
if(typeof(labels[i]) == 'number'){
for (var j=0; j<labels[i]; ++j){
labels_processed.push(null);}
} else if(typeof(labels[i]) == 'string' || typeof(labels[i]) == 'object'){
labels_processed.push(labels[i]);} else {
labels_processed.push('');}
}
RGraph.NoShadow(obj);if(labels_processed && labels_processed.length > 0){
for (var i=0; i<labels_processed.length; ++i){
if(labels_processed[i]){
var coords = obj.coords[i];if(coords && coords.length > 0){
var x = (obj.type == 'bar' ? coords[0] + (coords[2] / 2) : coords[0]);var y = (obj.type == 'bar' ? coords[1] + (coords[3] / 2) : coords[1]);var length = typeof(labels_processed[i][4]) == 'number' ? labels_processed[i][4] : 25;context.beginPath();context.fillStyle = 'black';context.strokeStyle = 'black';if(obj.type == 'bar'){
if(obj.Get('chart.variant') == 'dot'){
context.moveTo(x, obj.coords[i][1] - 5);context.lineTo(x, obj.coords[i][1] - 5 - length);var text_x = x;var text_y = obj.coords[i][1] - 5 - length;} else if(obj.Get('chart.variant') == 'arrow'){
context.moveTo(x, obj.coords[i][1] - 5);context.lineTo(x, obj.coords[i][1] - 5 - length);var text_x = x;var text_y = obj.coords[i][1] - 5 - length;} else {
context.arc(x, y, 2.5, 0, 6.28, 0);context.moveTo(x, y);context.lineTo(x, y - length);var text_x = x;var text_y = y - length;}
context.stroke();context.fill();} else if(obj.type == 'line'){
if(
typeof(labels_processed[i]) == 'object' &&
typeof(labels_processed[i][3]) == 'number' &&
labels_processed[i][3] == -1
){
context.moveTo(x, y + 5);context.lineTo(x, y + 5 + length);context.stroke();context.beginPath();                                
context.moveTo(x, y + 5);context.lineTo(x - 3, y + 10);context.lineTo(x + 3, y + 10);context.closePath();var text_x = x;var text_y = y + 5 + length;} else {
var text_x = x;var text_y = y - 5 - length;context.moveTo(x, y - 5);context.lineTo(x, y - 5 - length);context.stroke();context.beginPath();context.moveTo(x, y - 5);context.lineTo(x - 3, y - 10);context.lineTo(x + 3, y - 10);context.closePath();}
context.fill();}
context.beginPath();context.fillStyle = (typeof(labels_processed[i]) == 'object' && typeof(labels_processed[i][1]) == 'string') ? labels_processed[i][1] : 'black';RGraph.Text(context,
obj.Get('chart.text.font'),
obj.Get('chart.text.size'),
text_x,
text_y,
(typeof(labels_processed[i]) == 'object' && typeof(labels_processed[i][0]) == 'string') ? labels_processed[i][0] : labels_processed[i],
'bottom',
'center',
true,
null,
(typeof(labels_processed[i]) == 'object' && typeof(labels_processed[i][2]) == 'string') ? labels_processed[i][2] : 'white');context.fill();}
}
}
}
}
RGraph.FixEventObject = function (e)
{
if(RGraph.isIE8()){
var e = event;e.pageX = (event.clientX + document.body.scrollLeft);e.pageY = (event.clientY + document.body.scrollTop);e.target = event.srcElement;if(!document.body.scrollTop && document.documentElement.scrollTop){
e.pageX += parseInt(document.documentElement.scrollLeft);e.pageY += parseInt(document.documentElement.scrollTop);}
}
if(typeof(e.offsetX) == 'undefined' && typeof(e.offsetY) == 'undefined'){
var coords = RGraph.getMouseXY(e);e.offsetX = coords[0];e.offsetY = coords[1];}
if(!e.stopPropagation){
e.stopPropagation = function (){window.event.cancelBubble = true;}
}
return e;}
RGraph.DrawCrosshairs = function (obj)
{
if(obj.Get('chart.crosshairs')){
var canvas = obj.canvas;var context = obj.context;canvas.onmousemove = function (e)
{
var e = RGraph.FixEventObject(e);var canvas = obj.canvas;var context = obj.context;var gutter = obj.Get('chart.gutter');var width = canvas.width;var height = canvas.height;var adjustments = obj.Get('chart.tooltips.coords.adjust');var mouseCoords = RGraph.getMouseXY(e);var x = mouseCoords[0];var y = mouseCoords[1];if(typeof(adjustments) == 'object' && adjustments[0] && adjustments[1]){
x = x - adjustments[0];y = y - adjustments[1];}
RGraph.Clear(canvas);obj.Draw();if(   x >= gutter
&& y >= gutter
&& x <= (width - gutter)
&& y <= (height - gutter)
){
var linewidth = obj.Get('chart.crosshairs.linewidth');context.lineWidth = linewidth ? linewidth : 1;context.beginPath();context.strokeStyle = obj.Get('chart.crosshairs.color');context.moveTo(x, gutter);context.lineTo(x, height - gutter);context.moveTo(gutter, y);context.lineTo(width - gutter, y);context.stroke();if(obj.Get('chart.crosshairs.coords')){
if(obj.type == 'scatter'){
var xCoord = (((x - obj.Get('chart.gutter')) / (obj.canvas.width - (2 * obj.Get('chart.gutter')))) * (obj.Get('chart.xmax') - obj.Get('chart.xmin'))) + obj.Get('chart.xmin');xCoord = xCoord.toFixed(obj.Get('chart.scale.decimals'));var yCoord = obj.max - (((y - obj.Get('chart.gutter')) / (obj.canvas.height - (2 * obj.Get('chart.gutter')))) * obj.max);if(obj.type == 'scatter' && obj.Get('chart.xaxispos') == 'center'){
yCoord = (yCoord - (obj.max / 2)) * 2;}
yCoord = yCoord.toFixed(obj.Get('chart.scale.decimals'));var div = RGraph.Registry.Get('chart.coordinates.coords.div');var mouseCoords = RGraph.getMouseXY(e);var canvasXY = RGraph.getCanvasXY(canvas);if(!div){
div = document.createElement('DIV');div.__object__ = obj;div.style.position = 'absolute';div.style.backgroundColor = 'white';div.style.border = '1px solid black';div.style.fontFamily = 'Arial, Verdana, sans-serif';div.style.fontSize = '10pt'
div.style.padding = '2px';div.style.opacity = 1;div.style.WebkitBorderRadius = '3px';div.style.borderRadius = '3px';div.style.MozBorderRadius = '3px';document.body.appendChild(div);RGraph.Registry.Set('chart.coordinates.coords.div', div);}
div.style.opacity = 1;div.style.display = 'inline';if(!obj.Get('chart.crosshairs.coords.fixed')){
div.style.left = Math.max(2, (e.pageX - div.offsetWidth - 3)) + 'px';div.style.top = Math.max(2, (e.pageY - div.offsetHeight - 3))  + 'px';} else {
div.style.left = canvasXY[0] + obj.Get('chart.gutter') + 3 + 'px';div.style.top = canvasXY[1] + obj.Get('chart.gutter') + 3 + 'px';}
div.innerHTML = '<span style="color: #666">' + obj.Get('chart.crosshairs.coords.labels.x') + ':</span> ' + xCoord + '<br><span style="color: #666">' + obj.Get('chart.crosshairs.coords.labels.y') + ':</span> ' + yCoord;canvas.addEventListener('mouseout', RGraph.HideCrosshairCoords, false);} else {
alert('[RGRAPH] Showing crosshair coordinates is only supported on the Scatter chart');}
}
} else {
RGraph.HideCrosshairCoords();}
}
}
}
RGraph.HideCrosshairCoords = function ()
{
var div = RGraph.Registry.Get('chart.coordinates.coords.div');if(   div
&& div.style.opacity == 1
&& div.__object__.Get('chart.crosshairs.coords.fadeout')
){
setTimeout(function(){RGraph.Registry.Get('chart.coordinates.coords.div').style.opacity = 0.9;}, 50);setTimeout(function(){RGraph.Registry.Get('chart.coordinates.coords.div').style.opacity = 0.8;}, 100);setTimeout(function(){RGraph.Registry.Get('chart.coordinates.coords.div').style.opacity = 0.7;}, 150);setTimeout(function(){RGraph.Registry.Get('chart.coordinates.coords.div').style.opacity = 0.6;}, 200);setTimeout(function(){RGraph.Registry.Get('chart.coordinates.coords.div').style.opacity = 0.5;}, 250);setTimeout(function(){RGraph.Registry.Get('chart.coordinates.coords.div').style.opacity = 0.4;}, 300);setTimeout(function(){RGraph.Registry.Get('chart.coordinates.coords.div').style.opacity = 0.3;}, 350);setTimeout(function(){RGraph.Registry.Get('chart.coordinates.coords.div').style.opacity = 0.2;}, 400);setTimeout(function(){RGraph.Registry.Get('chart.coordinates.coords.div').style.opacity = 0.1;}, 450);setTimeout(function(){RGraph.Registry.Get('chart.coordinates.coords.div').style.opacity = 0;}, 500);setTimeout(function(){RGraph.Registry.Get('chart.coordinates.coords.div').style.display = 'none';}, 550);}
}
RGraph.rtrim = function (str)
{
return str.replace(/( |\n|\r|\t)+$/, '');}
RGraph.Draw3DAxes = function (obj)
{
var gutter = obj.Get('chart.gutter');var context = obj.context;var canvas = obj.canvas;context.strokeStyle = '#aaa';context.fillStyle = '#ddd';context.beginPath();context.moveTo(gutter, gutter);context.lineTo(gutter + 10, gutter - 5);context.lineTo(gutter + 10, canvas.height - gutter - 5);context.lineTo(gutter, canvas.height - gutter);context.closePath();context.stroke();context.fill();context.beginPath();context.moveTo(gutter, canvas.height - gutter);context.lineTo(gutter + 10, canvas.height - gutter - 5);context.lineTo(canvas.width - gutter + 10,  canvas.height - gutter - 5);context.lineTo(canvas.width - gutter, canvas.height - gutter);context.closePath();context.stroke();context.fill();}
RGraph.NoShadow = function (obj)
{
obj.context.shadowColor = 'rgba(0,0,0,0)';obj.context.shadowBlur = 0;obj.context.shadowOffsetX = 0;obj.context.shadowOffsetY = 0;}
RGraph.SetShadow = function (obj, color, offsetx, offsety, blur)
{
obj.context.shadowColor = color;obj.context.shadowOffsetX = offsetx;obj.context.shadowOffsetY = offsety;obj.context.shadowBlur = blur;}
RGraph.OldBrowserCompat = function (context)
{
if(!context.measureText){
context.measureText = function (text)
{
var textObj = document.createElement('DIV');textObj.innerHTML = text;textObj.style.backgroundColor = 'white';textObj.style.position = 'absolute';textObj.style.top = -100
textObj.style.left = 0;document.body.appendChild(textObj);var width = {width: textObj.offsetWidth};textObj.style.display = 'none';return width;}
}
if(!context.fillText){
context.fillText = function (text, targetX, targetY)
{
return false;}
}
if(!context.canvas.addEventListener){
window.addEventListener = function (ev, func, bubble)
{
return this.attachEvent('on' + ev, func);}
context.canvas.addEventListener = function (ev, func, bubble)
{
return this.attachEvent('on' + ev, func);}
}
}
RGraph.getSegment = function (e)
{
RGraph.FixEventObject(e);var accuracy = arguments[1] ? arguments[1] : 0;var obj = e.target.__object__;var canvas = obj.canvas;var context = obj.context;var mouseCoords = RGraph.getMouseXY(e);var x = mouseCoords[0] - obj.centerx;var y = mouseCoords[1] - obj.centery;var r = obj.radius;var theta = Math.atan(y / x);var hyp = y / Math.sin(theta);var angles = obj.angles;var ret = [];var hyp = (hyp < 0) ? hyp + accuracy : hyp - accuracy;theta *= 57.3
if(obj.type == 'rose'){
if(   (isNaN(hyp) && Math.abs(mouseCoords[0]) < (obj.centerx - r) )
|| (isNaN(hyp) && Math.abs(mouseCoords[0]) > (obj.centerx + r))
|| (!isNaN(hyp) && Math.abs(hyp) > r)){
return;}
}
if(x < 0 && y >= 0){
theta += 180;} else if(x < 0 && y < 0){
theta += 180;} else if(x > 0 && y < 0){
theta += 360;}
if(obj.type == 'rose'){
theta += 90;}
if(theta > 360){
theta -= 360;}
for (var i=0; i<angles.length; ++i){
if(theta >= angles[i][0] && theta < angles[i][1]){
hyp = Math.abs(hyp);if(obj.type == 'rose' && hyp > angles[i][2]){
return null;}
if(!hyp || (obj.type == 'pie' && obj.radius && hyp > obj.radius) ){
return null;}
if(obj.type == 'pie' && obj.Get('chart.variant') == 'donut' && (hyp > obj.radius || hyp < (obj.radius / 2) ) ){
return null;}
ret[0] = obj.centerx;ret[1] = obj.centery;ret[2] = (obj.type == 'rose') ? angles[i][2] : obj.radius;ret[3] = angles[i][0];ret[4] = angles[i][1];ret[5] = i;if(obj.type == 'rose'){
ret[3] -= 90;ret[4] -= 90;if(x > 0 && y < 0){
ret[3] += 360;ret[4] += 360;}
}
if(ret[3] < 0) ret[3] += 360;if(ret[4] > 360) ret[4] -= 360;return ret;}
}
return null;}
RGraph.Async = function (func)
{
return setTimeout(func, arguments[1] ? arguments[1] : 1);}
RGraph.random = function (min, max)
{
var dp = arguments[2] ? arguments[2] : 0;var r = Math.random();return Number((((max - min) * r) + min).toFixed(dp));}
RGraph.strokedCurvyRect = function (context, x, y, w, h)
{
var r = arguments[5] ? arguments[5] : 3;var corner_tl = (arguments[6] || arguments[6] == null) ? true : false;var corner_tr = (arguments[7] || arguments[7] == null) ? true : false;var corner_br = (arguments[8] || arguments[8] == null) ? true : false;var corner_bl = (arguments[9] || arguments[9] == null) ? true : false;context.beginPath();context.moveTo(x + (corner_tl ? r : 0), y);context.lineTo(x + w - (corner_tr ? r : 0), y);if(corner_tr){
context.arc(x + w - r, y + r, r, Math.PI * 1.5, Math.PI * 2, false);}
context.lineTo(x + w, y + h - (corner_br ? r : 0) );if(corner_br){
context.arc(x + w - r, y - r + h, r, Math.PI * 2, Math.PI * 0.5, false);}
context.lineTo(x + (corner_bl ? r : 0), y + h);if(corner_bl){
context.arc(x + r, y - r + h, r, Math.PI * 0.5, Math.PI, false);}
context.lineTo(x, y + (corner_tl ? r : 0) );if(corner_tl){
context.arc(x + r, y + r, r, Math.PI, Math.PI * 1.5, false);}
context.stroke();}
RGraph.filledCurvyRect = function (context, x, y, w, h)
{
var r = arguments[5] ? arguments[5] : 3;var corner_tl = (arguments[6] || arguments[6] == null) ? true : false;var corner_tr = (arguments[7] || arguments[7] == null) ? true : false;var corner_br = (arguments[8] || arguments[8] == null) ? true : false;var corner_bl = (arguments[9] || arguments[9] == null) ? true : false;context.beginPath();if(corner_tl){
context.moveTo(x + r, y + r);context.arc(x + r, y + r, r, Math.PI, 1.5 * Math.PI, false);} else {
context.fillRect(x, y, r, r);}
if(corner_tr){
context.moveTo(x + w - r, y + r);context.arc(x + w - r, y + r, r, 1.5 * Math.PI, 0, false);} else {
context.moveTo(x + w - r, y);context.fillRect(x + w - r, y, r, r);}
if(corner_br){
context.moveTo(x + w - r, y + h - r);context.arc(x + w - r, y - r + h, r, 0, Math.PI / 2, false);} else {
context.moveTo(x + w - r, y + h - r);context.fillRect(x + w - r, y + h - r, r, r);}
if(corner_bl){
context.moveTo(x + r, y + h - r);context.arc(x + r, y - r + h, r, Math.PI / 2, Math.PI, false);} else {
context.moveTo(x, y + h - r);context.fillRect(x, y + h - r, r, r);}
context.fillRect(x + r, y, w - r - r, h);context.fillRect(x, y + r, r + 1, h - r - r);context.fillRect(x + w - r - 1, y + r, r + 1, h - r - r);context.fill();}
RGraph.Timer = function (label)
{
var d = new Date();console.log(label + ': ' + d.getSeconds() + '.' + d.getMilliseconds());}
RGraph.HidePalette = function ()
{
var div = RGraph.Registry.Get('palette');if(typeof(div) == 'object' && div){
div.style.visibility = 'hidden';div.style.display = 'none';RGraph.Registry.Set('palette', null);}
}
RGraph.HideZoomedCanvas = function ()
{
if(typeof(__zoomedimage__) == 'object'){
obj = __zoomedimage__.obj;} else {
return;}
if(obj.Get('chart.zoom.fade.out')){
for (var i=10,j=1; i>=0; --i, ++j){
if(typeof(__zoomedimage__) == 'object'){
setTimeout("__zoomedimage__.style.opacity = " + String(i / 10), j * 30);}
}
if(typeof(__zoomedbackground__) == 'object'){
setTimeout("__zoomedbackground__.style.opacity = " + String(i / 10), j * 30);}
}
if(typeof(__zoomedimage__) == 'object'){
setTimeout("__zoomedimage__.style.display = 'none'", obj.Get('chart.zoom.fade.out') ? 310 : 0);}
if(typeof(__zoomedbackground__) == 'object'){
setTimeout("__zoomedbackground__.style.display = 'none'", obj.Get('chart.zoom.fade.out') ? 310 : 0);}
}
RGraph.AddCustomEventListener = function (obj, name, func)
{
if(typeof(RGraph.events[obj.id]) == 'undefined'){
RGraph.events[obj.id] = [];}
RGraph.events[obj.id].push([obj, name, func]);return RGraph.events[obj.id].length - 1;}
RGraph.FireCustomEvent = function (obj, name)
{
var id = obj.id;if(   typeof(id) == 'string'
&& typeof(RGraph.events) == 'object'
&& typeof(RGraph.events[id]) == 'object'
&& RGraph.events[id].length > 0){
for(var j=0; j<RGraph.events[id].length; ++j){
if(RGraph.events[id][j] && RGraph.events[id][j][1] == name){
RGraph.events[id][j][2](obj);}
}
}
}
RGraph.isIE8 = function ()
{
return navigator.userAgent.indexOf('MSIE 8') > 0;}
RGraph.isIE9 = function ()
{
return navigator.userAgent.indexOf('MSIE 9') > 0;}
RGraph.isIE9up = function ()
{
navigator.userAgent.match(/MSIE (\d+)/);return Number(RegExp.$1) >= 9;}
RGraph.ClearEventListeners = function (id)
{
for (var i=0; i<RGraph.Registry.Get('chart.event.handlers').length; ++i){
var el = RGraph.Registry.Get('chart.event.handlers')[i];if(el && (el[0] == id || el[0] == ('window_' + id)) ){
if(el[0].substring(0, 7) == 'window_'){
window.removeEventListener(el[1], el[2], false);} else {
document.getElementById(id).removeEventListener(el[1], el[2], false);}
RGraph.Registry.Get('chart.event.handlers')[i] = null;}
}
}
RGraph.AddEventListener = function (id, e, func)
{
RGraph.Registry.Get('chart.event.handlers').push([id, e, func]);}
RGraph.getGutterSuggest = function (obj, data)
{
var str = RGraph.number_format(obj, RGraph.array_max(RGraph.getScale(RGraph.array_max(data), obj)), obj.Get('chart.units.pre'), obj.Get('chart.units.post'));if(obj.type == 'hbar'){
var str = '';var len = 0;for (var i=0; i<obj.Get('chart.labels').length; ++i){
str = (obj.Get('chart.labels').length > str.length ? obj.Get('chart.labels')[i] : str);}
}
obj.context.font = obj.Get('chart.text.size') + 'pt ' + obj.Get('chart.text.font');len = obj.context.measureText(str).width + 5;return (obj.type == 'hbar' ? len / 3 : len);}
RGraph.array_shift = function (arr)
{
var ret = [];for (var i=1; i<arr.length; ++i) ret.push(arr[i]);return ret;}
RGraph.SetConfig = function (obj, c)
{
for (i in c){
if(typeof(i) == 'string'){
obj.Set(i, c[i]);}
}
return obj;}
RGraph.GetHeight = function (obj)
{
var height = obj.Get('chart.height');return height ? height : obj.canvas.height;}
RGraph.GetWidth = function (obj)
{
var width = obj.Get('chart.width');return width ? width : obj.canvas.width;}
RGraph.RemoveAllCustomEventListeners = function ()
{
var id = arguments[0];if(id && RGraph.events[id]){
RGraph.events[id] = [];} else {
RGraph.events = [];}
}
RGraph.RemoveCustomEventListener = function (obj, i)
{
if(   typeof(RGraph.events) == 'object'
&& typeof(RGraph.events[obj.id]) == 'object'
&& typeof(RGraph.events[obj.id][i]) == 'object'){
RGraph.events[obj.id][i] = null;}
}