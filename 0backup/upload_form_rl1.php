<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Untitled Document</title>
</head>
<script src='http://code.jquery.com/jquery-latest.js'></script>
	<script type='text/javascript'>
        $(document).ready(function () {
			$('#div1').hide();//na pocetok sokrij gi site
			$('#div2').hide();
			$('#div3').hide();
			$('#div4').hide();
			$('#div5').hide();
			$('#div6').hide();
					
        $('#id_radio1').click(function () {
			$('#div1').css({'width':'auto', 'height':'auto', '-webkit-border-radius':'20px', 'border-radius':'20px', 'background':'rgba(239,243,246,0.7)'});
		    $('#div1').show('fast');//pri klik na radio button1 prviot se prikazuva ostanatite se sokrieni
			$('#div2').hide('fast');
			$('#div3').hide('fast');
			$('#div4').hide('fast');
			$('#div5').hide('fast');
			$('#div6').hide('fast');
		});
	    
		$('#id_radio2').click(function () {
			$('#div2').css({'width':'auto', 'height':'auto', '-webkit-border-radius':'20px', 'border-radius':'20px', 'background':'rgba(239,243,246,0.7)'});
			$('#div1').hide('fast');
			$('#div2').show('fast');
			$('#div3').hide('fast');
			$('#div4').hide('fast');
			$('#div5').hide('fast');
			$('#div6').hide('fast');
	    });
					 
		$('#id_radio3').click(function () {
	        $('#div3').css({'width':'auto', 'height':'auto', '-webkit-border-radius':'20px', 'border-radius':'20px', 'background':'rgba(239,243,246,0.7)'});
			$('#div1').hide('fast');
			$('#div2').hide('fast');
			$('#div3').show('fast');
			$('#div4').hide('fast');
			$('#div5').hide('fast');
			$('#div6').hide('fast');
	    });
		
		$('#id_radio4').click(function () {
	        $('#div4').css({'width':'auto', 'height':'auto', '-webkit-border-radius':'20px', 'border-radius':'20px', 'background':'rgba(239,243,246,0.7)'});
			$('#div1').hide('fast');
			$('#div2').hide('fast');
			$('#div3').hide('fast');
			$('#div4').show('fast');
			$('#div5').hide('fast');
			$('#div6').hide('fast');
	    });
		
		$('#id_radio5').click(function () {
	        $('#div5').css({'width':'auto', 'height':'auto', '-webkit-border-radius':'20px', 'border-radius':'20px', 'background':'rgba(239,243,246,0.7)'});
			$('#div1').hide('fast');
			$('#div2').hide('fast');
			$('#div3').hide('fast');
			$('#div4').hide('fast');
			$('#div5').show('fast');
			$('#div6').hide('fast');
	    });
		
			$('#id_radio6').click(function () {
	        $('#div6').css({'width':'auto', 'height':'auto', '-webkit-border-radius':'20px', 'border-radius':'20px', 'background':'rgba(239,243,246,0.7)'});
			$('#div1').hide('fast');
			$('#div2').hide('fast');
			$('#div3').hide('fast');
			$('#div6').show('fast');
			$('#div5').hide('fast');
			$('#div4').hide('fast');
	    });
    });			   
</script>



<body>

<h2>Choise</h2>

		<table style='width: 50%'>
			<tr>
				<td><input id='id_radio1' type='radio' name='name_radio1' value='value_radio1' />Demand Towns</td>
				<td><input id='id_radio2' type='radio' name='name_radio1' value='value_radio2' />Demand Agriculture</td>
				<td><input id='id_radio3' type='radio' name='name_radio1' value='value_radio3' />Demand Ecology</td>
				<td><input id='id_radio4' type='radio' name='name_radio1' value='value_radio4' />Upper reservoir limit </td>
				<td><input id='id_radio5' type='radio' name='name_radio1' value='value_radio5' />Lower reservoir limit</td>
                	<td><input id='id_radio6' type='radio' name='name_radio1' value='value_radio6' />Storage discretization</td>
			</tr>
			<tr>
				<td colspan='6'>
				<form id='uploadform' enctype='multipart/form-data' action='uploadSDP.php' name='uploadSDP'  value='uploadSDP' method='post'>
					<div id='div1'>
						<div>
							<p>
							Upload CSV File for water demand of population							
							<input name='File1' type='file' />
							<input name='typedb' type='submit' value='demandtown_rl' />
							</p>
						</div>
					</div>
					<div id='div2'>
						<div>
							<p>
							Upload CSV File for water demand for agriculture							
							<input name='File2' type='file' />
							<input name='typedb' type='submit' value='demandagriculture_rl' />
							</p>
						</div>
					</div>
					<div id='div3'>
						<div>
							<p>
							Upload CSV File for water demand for ecology							
							<input name='File3' type='file' />
							<input name='typedb' type='submit' value='demandecology_rl' />
							</p>
						</div>
					</div>
					<div id='div4'>
						<div>
							<p>
							Upload CSV File for upper reservoir limit							
							<input name='File4' type='file' />
							<input name='typedb'   type='submit' value='flood_rl' />
							</p>
						</div>
					</div>
                    
                    <div id='div5'>
						<div>
							<p>
							Upload CSV File for lower reservoir limit							
							<input name='ufile' type='file' />
							
                            <input name='typedb'   type='submit'  value='recreation_rl'  />
							</p>
						</div>
					</div>
                    
					<div id='div6'>
						<div>
							<p>
							Upload CSV File For Storage discretization						
							<input name='ufile' type='file' />
							
                            <input name='typedb'    type='submit' value='storage_rl'  />
							</p>
						</div>
					</div>
          
				</form>
				</td>
			</tr>
		</table>



</body>
</html>
