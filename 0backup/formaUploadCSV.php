<html>
<head>
<title>Delieptrov</title>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript">
        $(document).ready(function () {
			$('#div1').hide();//na pocetok sokrij gi site
			$('#div2').hide();
			$('#div3').hide();
			$('#div4').hide();
			$('#div5').hide();
					
        $('#id_radio1').click(function () {
			$('#div1').css({"width":"auto", "height":"auto", "-webkit-border-radius":"20px", "border-radius":"20px", "background":"rgba(239,243,246,0.7)"});
		    $('#div1').show('fast');//pri klik na radio button1 prviot se prikazuva ostanatite se sokrieni
			$('#div2').hide('fast');
			$('#div3').hide('fast');
			$('#div4').hide('fast');
			$('#div5').hide('fast');
		});
	    
		$('#id_radio2').click(function () {
			$('#div2').css({"width":"auto", "height":"auto", "-webkit-border-radius":"20px", "border-radius":"20px", "background":"rgba(239,243,246,0.7)"});
			$('#div1').hide('fast');
			$('#div2').show('fast');
			$('#div3').hide('fast');
			$('#div4').hide('fast');
			$('#div5').hide('fast');
	    });
					 
		$('#id_radio3').click(function () {
	        $('#div3').css({"width":"auto", "height":"auto", "-webkit-border-radius":"20px", "border-radius":"20px", "background":"rgba(239,243,246,0.7)"});
			$('#div1').hide('fast');
			$('#div2').hide('fast');
			$('#div3').show('fast');
			$('#div4').hide('fast');
			$('#div5').hide('fast');
	    });
		
		$('#id_radio4').click(function () {
	        $('#div4').css({"width":"auto", "height":"auto", "-webkit-border-radius":"20px", "border-radius":"20px", "background":"rgba(239,243,246,0.7)"});
			$('#div1').hide('fast');
			$('#div2').hide('fast');
			$('#div3').hide('fast');
			$('#div4').show('fast');
			$('#div5').hide('fast');
	    });
		
		$('#id_radio5').click(function () {
	        $('#div5').css({"width":"auto", "height":"auto", "-webkit-border-radius":"20px", "border-radius":"20px", "background":"rgba(239,243,246,0.7)"});
			$('#div1').hide('fast');
			$('#div2').hide('fast');
			$('#div3').hide('fast');
			$('#div4').hide('fast');
			$('#div5').show('fast');
	    });
    });			   
</script>

</head>
<body>
<!-- Za koristenje na formata vo centralen del da se izvadat kometarite samo od tagot centar-->
	<!--<center>-->
		<h2>Choise</h2>

		<table style="width: 50%">
			<tr>
				<td><input id="id_radio1" type="radio" name="name_radio1" value="value_radio1" />Demand</td>
				<td><input id="id_radio2" type="radio" name="name_radio1" value="value_radio2" />Flood</td>
				<td><input id="id_radio3" type="radio" name="name_radio1" value="value_radio3" />Inflow</td>
				<td><input id="id_radio4" type="radio" name="name_radio1" value="value_radio4" />Recreation</td>
				<td><input id="id_radio5" type="radio" name="name_radio1" value="value_radio5" />Storage-disk</td>
			</tr>
			<tr>
				<td colspan="5">
				<form action="file:///C|/Users/Blagoj Delipetrev/Dropbox/0postdiplomci/Dragan_Zlatkovski/Zadaca 01/vnesicvs.php" method="post" enctype="multipart/form-data" name="cvs" id="form-vnesicvs">
					<div id="div1">
						<div>
							<p>
							Upload CSV File For Demand							
							<input name="File1" type="file" />
							<input name="Button1" type="submit" value="Upload CSV" />
							</p>
						</div>
					</div>
					<div id="div2">
						<div>
							<p>
							Upload CSV File For Flood							
							<input name="File2" type="file" />
							<input name="Button2" type="submit" value="Upload CSV" />
							</p>
						</div>
					</div>
					<div id="div3">
						<div>
							<p>
							Upload CSV File For Inflow							
							<input name="File3" type="file" />
							<input name="Button3" type="submit" value="Upload CSV" />
							</p>
						</div>
					</div>
					<div id="div4">
						<div>
							<p>
							Upload CSV File For Recreation							
							<input name="File4" type="file" />
							<input name="Button4" type="submit" value="Upload CSV" />
							</p>
						</div>
					</div>
					<div id="div5">
						<div>
							<p>
							Upload CSV File For Storage-disk							
							<input name="File5" type="file" />
							<input name="Button5" type="submit" value="Upload CSV" />
							</p>
						</div>
					</div>
				</form>
				</td>
			</tr>
		</table>
	    
		
	<!--</center>-->
</body>
</html>