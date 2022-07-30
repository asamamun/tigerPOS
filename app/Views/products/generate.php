<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script type="text/javascript" src="<?= base_url()?>/assets/js/jquery-barcode.min.js"></script>
  <style>
    .frmContact {
  border-top: #c9e0dc 2px solid;
  background: #d2d5d4;
  padding: 25px;
  width: 270px;
  text-align: center;
  margin: 0 auto;
}

.frmContact .field-row {
  margin-bottom: 20px;
}

.frmContact div label {
  margin: 5px 0px 0px 5px;
  color: #49615d;
}

.input_box {
  padding: 10px;
  border: #a5d2ca 1px solid;
  border-radius: 4px;
  background-color: #FFF;
  width: 100%;
  margin-top: 5px;
}

.select_box {
  padding: 10px;
  border: #a5d2ca 1px solid;
  border-radius: 4px;
  background-color: #FFF;
  margin-top: 5px;
}

select.select_box {
  height: 37px;
  margin-right: 10px;
}
.info {
  font-size: .8em;
  color: #FF6600;
  letter-spacing: 2px;
  padding-left: 5px;
}

.btnAction {
  background-color: #82a9a2;
  padding: 10px 40px;
  color: #FFF;
  border: #739690 1px solid;
  border-radius: 4px;
  cursor:pointer;
}
.column-right {
  margin-right: 6px;
}

.contact-row {
  display: inline-block;
}

.cvv-input {
  width: 60px;
}
.barcodeTarget{
  padding: 20px !important;
    margin: 0 auto;
}
#canvasTarget{
  display: block !important;
    margin: 0 auto;
    padding-top: 20px;
}
  </style>
</head>
<body>
<div>
  <h2 style="text-align: center;"> Generator Barcode </h2>
  <div class="frmContact">
        <div class="field-row">
            <label>Fill The Code</label> <span class="info"></span>
            <br /> 
            <input type="text" id="barcodeValue" value="198511062456" class="input_box">
        </div>
        <div class="field-row">
            <div class="contact-row column-right">
                <label>Barcode Type</label> 
                <span class="info"></span>
                <br /> 
                <select name="btype" class="select_box">
                <option value="ean8">EAN 8 (Only For Numbers)</option>
        <option value="ean13">EAN 13(Only For Numbers)</option>
        <option value="upc" selected>UPC(Only For Numbers)</option>
        <option value="int25">interleaved 2 of 5 (Only For Numbers)</option>
        <option value="code11">code 11 (Only For Numbers)</option>
        <option value="code39">Code 39</option>
        <option value="code93">code 93</option>
        <option value="code128">code 128</option>
        <option value="codabar">codabar (Only For Numbers)</option>
        <option value="msi">MSI(Only For Numbers)</option>
        <option value="datamatrix">Data Matrix</option>
                </select> 
                
                
            </div>
            <div class="contact-row cvv-box">
                <label>Format</label> <span class="info"></span><br />
                <select name="renderer" class="select_box">
        <option value="css">CSS</option>
        <option value="bmp">BMP (not usable in IE)</option>
        <option value="canvas">Canvas (not usable in IE)</option>
                </select>
            </div>
            
        </div>
        
        <div>
            <input type="button" onclick="generateBarcode();" value="Generate the barcode" class="btnAction">
        </div>
   
    </div>
    <div id="barcodeTarget" class="barcodeTarget"></div>
    <canvas id="canvasTarget" width="150" height="150"></canvas>
</div>
<script>
    function generateBarcode(){
     var value = $("#barcodeValue").val();
     var btype = $('select[name="btype"]').val();
     var renderer = $('select[name="renderer"]').val();
     
     
     var settings = {
       output:renderer,
       bgColor: '#FFFFFF',
       color: '#000000',
       barWidth: '3',
       barHeight: '80',
       moduleSize: '5',
       posX: '10',
       posY: '20',
       addQuietZone: '1'
     };
     
     if (renderer == 'canvas'){
       clearCanvas();
       $("#barcodeTarget").hide();
       $("#canvasTarget").show().barcode(value, btype, settings);
     } else {
       $("#canvasTarget").hide();
       $("#barcodeTarget").html("").show().barcode(value, btype, settings);
     }
   }
       
   function showConfig1D(){
     $('.config .barcode1D').show();
     $('.config .barcode2D').hide();
   }
   
   function showConfig2D(){
     $('.config .barcode1D').hide();
     $('.config .barcode2D').show();
   }
   
   function clearCanvas(){
     var canvas = $('#canvasTarget').get(0);
     var ctx = canvas.getContext('2d');
     ctx.lineWidth = 1;
     ctx.lineCap = 'butt';
     ctx.fillStyle = '#FFFFFF';
     ctx.strokeStyle  = '#000000';
     ctx.clearRect (0, 0, canvas.width, canvas.height);
     ctx.strokeRect (0, 0, canvas.width, canvas.height);
   }
   
   $(function(){
     $('input[name=btype]').click(function(){
       if ($(this).attr('id') == 'datamatrix') showConfig2D(); else showConfig1D();
     });
     $('input[name=renderer]').click(function(){
       if ($(this).attr('id') == 'canvas') $('#miscCanvas').show(); 
       else $('#miscCanvas').hide();
     });
     generateBarcode();
   });
</script>
</body>
</html>