<?php
  session_start();
  if (!(isset($_SESSION["valid_user"])))
	  {
	  
	  header('Location:  index.php');
exit();
	  }
 

?>
<html>
  <head>
    <link rel="stylesheet" href="style/style-1.css" type="text/css" />
  	<link rel="stylesheet" href="style/style-3.css" type="text/css" />
   	<link rel="stylesheet" href="style/style-(backup).css" type="text/css" />
    <link rel="stylesheet" href="style/jquery/jquery.ui.all.css">
    <link type="text/css" href="style/jquery/jquery.ui.selectmenu.css" rel="stylesheet" />
    <link href="lib/jquery/enc/css/enhanced.css" type="text/css" rel="stylesheet" />
    <title>Hydro-Information System prototype application</title>
	<script src="lib/OpenLayers/OpenLayers.js"></script>
    <script src="lib/jquery/jquery-1.5.1.js"></script> 
	<script src="lib/jquery/ui/jquery.ui.core.js"></script> 
	<script src="lib/jquery/ui/jquery.ui.widget.js"></script> 
    <script type="text/javascript" src="lib/jquery/ui/jquery.ui.position.js"></script>
    <script type="text/javascript" src="lib/jquery/ui/jquery.ui.selectmenu.js"></script>
    <script src="lib/jquery/ui/jquery.ui.button.js"></script>
    <script type="text/javascript" src="lib/jquery/ui/jquery.ui.tabs.js"></script>
	<script type="text/javascript" src="lib/jquery/enc/js/jQuery.fileinput.js"></script>
    <script type="text/javascript" src="mailme2.js"></script>
    <script>
		function remakeToUpdateButtons(){
		$(function(){
			$( "input:submit, input:button").button();
			$('#ufile2').customFileInput();
			$( "#tabs" ).tabs();
		});	
	}
	$(function(){
		$('#ufile1').customFileInput();
		$('select#wroselect').selectmenu();
		$('select#layer-select').selectmenu();
	});
	</script>
	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=AIzaSyAzDyJAs-NT7QjUdHMHgecBIwVLsNY7iUY" type="text/javascript"></script>
    
    
    
<script type="text/javascript">


//This function will be called when the upload completes.
function uploadComplete(status){
   //set the status message to that returned by the server
   document.getElementById('status').innerHTML=status;
}

//window.onload=initUpload;
</script>
    
    
    
    
    
    
    <script type="text/javascript">  	

	var map, wfs;
	var panel;
OpenLayers.ProxyHost = "/cgi-bin/proxy.cgi?url=";

var DeleteFeature = OpenLayers.Class(OpenLayers.Control, {
    initialize: function(layer, options) {
        OpenLayers.Control.prototype.initialize.apply(this, [options]);
        this.layer = layer;
        this.handler = new OpenLayers.Handler.Feature(
            this, layer, {click: this.clickFeature}
        );
    },
    clickFeature: function(feature) {
        // if feature doesn't have a fid, destroy it
        if(feature.fid == undefined) {
            this.layer.destroyFeatures([feature]);
        } else {
            feature.state = OpenLayers.State.DELETE;
            this.layer.events.triggerEvent("afterfeaturemodified", 
                                           {feature: feature});
            feature.renderIntent = "select";
            this.layer.drawFeature(feature);
        }
    },
    setMap: function(map) {
        this.handler.setMap(map);
        OpenLayers.Control.prototype.setMap.apply(this, arguments);
    },
    CLASS_NAME: "OpenLayers.Control.DeleteFeature"
});








function init() {
	document.getElementById("map").innerHTML="";
    map = new OpenLayers.Map("map");

   // HERE are declared WMS maps that are used as backgrould maps !!!
   
   
   
    base1= new OpenLayers.Layer.WMS( "OpenLayers WMS", "http://vmap0.tiles.osgeo.org/wms/vmap0", {layers: 'basic'} );
     
	base1.attribution = 'IGN topo maps from <a target="_blank" href="http://www.idee.es/">IDEE</a>';

  map.addLayer(base1);
	
  var google = new OpenLayers.Layer.Google( "Google", { type: G_HYBRID_MAP } );
  map.addLayer(google);
/*  
var jpl_wms = new OpenLayers.Layer.WMS( "NASA Global Mosaic",
                "http://wms.jpl.nasa.gov/wms.cgi", 
                {layers: "modis,global_mosaic"});
   map.addLayer(jpl_wms);
  */
   /*  IN THE NEXT PART ARE DECLARED WFS VECTOR MAPS TOGETHER WITH THEIR STYLES
   ________________________________________________________________________
     */
    
    myStyles2 = new OpenLayers.StyleMap({
       "default": new OpenLayers.Style({
           strokeColor: "#3399FF",
           fillColor: "#3399FF",
           strokeWidth: 2,
           strokeOpacity: 1,
           fillOpacity: 0.7,
           pointRadius: 7
       })
       ,"select": new OpenLayers.Style({
           fillColor: "#00000FF",
           strokeColor: "#0000FF",
           pointRadius: 6
       }),
       "hover": new OpenLayers.Style({
           fillColor: "#CCCCCC",
           strokeColor: "#999999",
           pointRadius: 6
       })
   });


	 
      var rivers = new OpenLayers.Layer.Vector("Rivers", {
		  
		  styleMap: myStyles2,
		strategies: [new OpenLayers.Strategy.BBOX(), new OpenLayers.Strategy.Save()],
        protocol: new OpenLayers.Protocol.WFS({
		version: "1.1.0",
        //url: "http://localhost:8080/geoserver/wfs?",
		url: "http://79.99.60.36:8080/geoserver/wfs?",
		
        featureType:     "rivers",
        featureNS: "http://www.hmak.com",
		srsName: "EPSG:4326"
        })
    });
    map.addLayer(rivers);   




myStyles1 = new OpenLayers.StyleMap({
       "default": new OpenLayers.Style({
           strokeColor: "#FF0000",
           fillColor: "#FF0000",
           strokeWidth: 2,
           strokeOpacity: 1,
           fillOpacity: 0.7,
           pointRadius: 7
       })
       ,"select": new OpenLayers.Style({
           fillColor: "#00000FF",
           strokeColor: "#0000FF",
           pointRadius: 6
       }),
       "hover": new OpenLayers.Style({
           fillColor: "#CCCCCC",
           strokeColor: "#999999",
           pointRadius: 6
       })
   });





var canals = new OpenLayers.Layer.Vector("Canals", {
	styleMap: myStyles1,
		strategies: [new OpenLayers.Strategy.BBOX(), new OpenLayers.Strategy.Save()],
        protocol: new OpenLayers.Protocol.WFS({
		version: "1.1.0",
        url: "http://localhost:8080/geoserver/wfs?",
        featureType:     "canals",
        featureNS: "http://www.hmak.com",
		srsName: "EPSG:4326"
        })
    });
    map.addLayer(canals);   
	
	
	
	

var styles = new OpenLayers.StyleMap({
    "default": new OpenLayers.Style({
        pointRadius: 16,
        externalGraphic: "img/town.png"
    }),
    "select": new OpenLayers.Style({
        pointRadius: 16,
        externalGraphic: "http://mnps.org/googlemaps/images/orange.png"
    })
});


	
	
var users = new OpenLayers.Layer.Vector("Users", {
		
		

		styleMap: styles,
		strategies: [new OpenLayers.Strategy.BBOX(), new OpenLayers.Strategy.Save()],
        protocol: new OpenLayers.Protocol.WFS({
		version: "1.1.0",
        url: "http://localhost:8080/geoserver/wfs?",
        featureType:     "users",
        featureNS: "http://www.hmak.com",
		srsName: "EPSG:4326"
		

        })
		
    });
    map.addLayer(users); 
	
	
	
	var stylesR = new OpenLayers.StyleMap({
    "default": new OpenLayers.Style({
        pointRadius: 16,
        externalGraphic: "img/reservoir.gif"
    }),
    "select": new OpenLayers.Style({
        pointRadius: 16,
        externalGraphic: "http://mnps.org/googlemaps/images/orange.png"
    })
});
	
	
	
var reservoir = new OpenLayers.Layer.Vector("Reservoir", {
	
	styleMap: stylesR,
        strategies: [new OpenLayers.Strategy.BBOX(), new OpenLayers.Strategy.Save()],
        protocol: new OpenLayers.Protocol.WFS({
		version: "1.1.0",
         url: "http://localhost:8080/geoserver/wfs?",
        featureType:     "reservoir",
          featureNS: "http://www.hmak.com",
			srsName: "EPSG:4326"
        })
    });
    map.addLayer(reservoir);



myStyles3 = new OpenLayers.StyleMap({
       "default": new OpenLayers.Style({
           strokeColor: "#00FF00",
           fillColor: "#00FF00",
           strokeWidth: 2,
           strokeOpacity: 1,
           fillOpacity: 0.7,
           pointRadius: 7
       })
       ,"select": new OpenLayers.Style({
           fillColor: "#00000FF",
           strokeColor: "#0000FF",
           pointRadius: 6
       }),
       "hover": new OpenLayers.Style({
           fillColor: "#CCCCCC",
           strokeColor: "#999999",
           pointRadius: 6
       })
   });




var land_agriculture = new OpenLayers.Layer.Vector("Land_agriculture", {
	
	styleMap: myStyles3,
        strategies: [new OpenLayers.Strategy.BBOX(), new OpenLayers.Strategy.Save()],
        protocol: new OpenLayers.Protocol.WFS({
		version: "1.1.0",
         url: "http://localhost:8080/geoserver/wfs?",
        featureType:     "land_agriculture",
          featureNS: "http://www.hmak.com",
			srsName: "EPSG:4326"
        })
    });
    map.addLayer(land_agriculture);


var stylesInflows = new OpenLayers.StyleMap({
    "default": new OpenLayers.Style({
        pointRadius: 16,
        externalGraphic: "img/inflow.gif"
    }),
    "select": new OpenLayers.Style({
        pointRadius: 16,
        externalGraphic: "http://mnps.org/googlemaps/images/orange.png"
    })
});



var inflows = new OpenLayers.Layer.Vector("Inflow", {
	
	styleMap: stylesInflows,
        strategies: [new OpenLayers.Strategy.BBOX(), new OpenLayers.Strategy.Save()],
        protocol: new OpenLayers.Protocol.WFS({
		version: "1.1.0",
         url: "http://localhost:8080/geoserver/wfs?",
        featureType:     "inflows",
          featureNS: "http://www.hmak.com",
			srsName: "EPSG:4326"
        })
    });
    map.addLayer(inflows);



    /*  IN THIS PART ARE DEFINED THE CONTROLS THAT ARE USED TO WORK WITH THE MAPS
    _____________________________________________________________________

      */
	
 selectControl = new OpenLayers.Control.SelectFeature(
                [rivers,canals,users,reservoir,land_agriculture,inflows],
                {
                    clickout: true, toggle: false,
                    multiple: false, hover: false,
                    toggleKey: "ctrlKey", // ctrl key removes from selection
                    multipleKey: "shiftKey" // shift key adds to selection
                }
            );
            
            map.addControl(selectControl);
            selectControl.activate();
    

    panel = new OpenLayers.Control.Panel(
        {'displayClass': 'customEditingToolbar'}
    );
    var panel_save = new OpenLayers.Control.Panel(
        {'displayClass': 'customEditingToolbar'}
    );
	
	
    var navigate = new OpenLayers.Control.Navigation({
        title: "Pan Map"
    });
    
    var drawLand_agriculture = new OpenLayers.Control.DrawFeature(
        land_agriculture, OpenLayers.Handler.Polygon,
        {
            title: "Draw Feature",
            displayClass: "olControlDrawFeaturePolygon",
            multi: true
        }
    );
	
	
	 var drawRivers = new OpenLayers.Control.DrawFeature(
        rivers, OpenLayers.Handler.Path,
        {
            title: "Draw Polilyne",
            displayClass: "olControlDrawFeaturePolyline",
            multi: true
        }
    );
	
	 var drawCanals = new OpenLayers.Control.DrawFeature(
        canals, OpenLayers.Handler.Path,
        {
            title: "Draw Polilyne",
            displayClass: "olControlDrawFeaturePolyline",
            multi: true
        }
    );
	
	 var drawUsers = new OpenLayers.Control.DrawFeature(
        users, OpenLayers.Handler.Point,
        {
            title: "Draw Point",
            displayClass: "olControlDrawFeaturePoint"
          
        }
    );
    
     var drawInflows = new OpenLayers.Control.DrawFeature(
        inflows, OpenLayers.Handler.Point,
        {
            title: "Draw Point",
            displayClass: "olControlDrawFeaturePoint"
           
        }
    );
    
    
    
     var drawReservoir = new OpenLayers.Control.DrawFeature(
        reservoir, OpenLayers.Handler.Point,
        {
            title: "Draw Point",
            displayClass: "olControlDrawFeaturePoint"
            
        }
    );
    
    var edit = new OpenLayers.Control.ModifyFeature(canals,
	{
		title: "Modify Feature",
        displayClass: "olControlModifyFeature"
    });

    var delRivers = new DeleteFeature(rivers, {title: "Delete Feature"});
    var delCanals = new DeleteFeature(canals, {title: "Delete Feature"});
    var delReservoir = new DeleteFeature(reservoir, {title: "Delete Feature"});
    var delLand_agriculture = new DeleteFeature(land_agriculture, {title: "Delete Feature"});
    var delUsers = new DeleteFeature(users, {title: "Delete Feature"});
    var delInflows = new DeleteFeature(inflows, {title: "Delete Feature"});
    
    
    var save = new OpenLayers.Control.Button({
        title: "Save Changes",
        trigger: function() {
            if(edit.feature) {
              edit.selectControl.unselectAll();
            } 
            //saveStrategy.save();
            reservoir.strategies[1].save();
            inflows.strategies[1].save();
            land_agriculture.strategies[1].save();      
            users.strategies[1].save();    
			     rivers.strategies[1].save();
			     canals.strategies[1].save();
        },
        displayClass: "olControlSaveFeatures"
    });
	
	 
	
	
	var activeLayer = document.getElementById('layer-select').value;
  
  switch (activeLayer)
  {
      case 'canals':
 		   panel.addControls([navigate, delCanals, save, edit,  drawCanals ]);
      break;
                                                          
      case 'users':
        panel.addControls([navigate, delUsers, save, edit,  drawUsers ]);
      break;
      
      case  'rivers':
            panel.addControls([navigate, delRivers, save, edit,  drawRivers ]);
      break;
      
      case  'reservoir':
            panel.addControls([navigate, delReservoir, save, edit,  drawReservoir ]);
      break;
      
      case  'land_agriculture':
            panel.addControls([navigate, delLand_agriculture, save, edit,  drawLand_agriculture ]);
      break;
      
      case 'inflows':
        panel.addControls([navigate, delInflows , save, edit,  drawInflows ]);
      break;
      
  
 	default:
 		panel.addControls([navigate, delRivers, save, edit, draw_agriculture, drawRivers, drawUsers]);
    }
    
  
	panel.defaultControl = navigate;
    map.addControl(panel);
	map.addControl(new OpenLayers.Control.LayerSwitcher());
	
  
	
	
	

	
	

	
	 map.addControl(new OpenLayers.Control.MousePosition());

	

	
	var scaleline = new OpenLayers.Control.ScaleLine({
    div: document.getElementById("scaleline-id")
});
map.addControl(scaleline);





    /*  IN THIS PART IS THE FEATURE SELECT ON EACH LEAYER
    _____________________________________________________________________

      */

rivers.events.on({
    featureselected	: function(event) {
        var feature = event.feature;
		    var id =feature.attributes.id;
        var gid=feature.attributes.gid;
		    var name=feature.attributes.name;
		    var category = feature.attributes.category;
		    var goesin=feature.attributes.goesin;
	
		
		
		var form1="<div class='newform'><form name='frm'  onSubmit='mailme2river(this.form); return false;'><fieldset><legend><span class=''>1. Please input the attributes for the river branch </span></legend><table class='tablefrm1'><tr><td>Gid: </td><td><input name ='gid' type='text' id='txt1' value="+gid+"></td><td>ID: </td><td><input name ='id' type='text' id='txt1' value="+id+"></td><td>Name: </td><td><input name ='name' type='text' id='txt1' value="+name+"></td></tr><tr><td>Category:</td><td><input name ='category' type='text' id='txt1' value="+category+"></td><td>Goes-in:</td><td><input name ='goesin'  type='text' id='txt1' value="+goesin+"></td><td style='width:60px;'></td><td><input name ='Enter' type='submit' value='Enter' style='float:right;'/></td></tr></table></fieldset></form>";  	
		
		var table_name_rivers=gid+name;
			
		var form2 = "<form enctype='multipart/form-data' action='upload_river_table.php' method='post'><br/><fieldset><legend>TimeSeries Data</legend> <select name='typedb'>        <option value='notsel'>Select type</option>        <option value='inflow'>Inflow</option>               </select>    <div style='width:240px;'><input name='ufile2' type='file' size='28' id='ufile2'/></div>      <input type='hidden' name='imeto_za_tabela' value="+table_name_rivers+"/>    <input type='submit' value='Upload' name='upload' />        </form></div>        <br/>        <p><span id='info'></span></p></fieldset>";
		
		var form3=" ";
		document.getElementById("form-id2").innerHTML=form3;
		document.getElementById("form-id").innerHTML=form1;
		document.getElementById("form-id1").innerHTML=form2;
		
		remakeToUpdateButtons();
    }
});

 

 
 
 canals.events.on({
    featureselected: function(event) {
        var feature = event.feature;
    	
		var id =feature.attributes.id;
  		var gid=feature.attributes.gid;
		var lenght=feature.attributes.lenght;
		var category = feature.attributes.category;
		var goesin=feature.attributes.goesin;
		
		
		var form_canals="<div class='newform'><form name='frm'  onSubmit='mailme2canal(this.form); return false;'><fieldset><legend><span class=''>1. Please input the attributes for the canal branch </span></legend><table class='tablefrm1'><tr><td>Gid: </td><td><input name ='gid' type='text' id='txt1' value="+gid+"></td><td>ID: </td><td><input name ='id' type='text' id='txt1' value="+id+"></td><td>Lenght: </td><td><input name ='lenght' type='text' id='txt1' value="+lenght+"></td></tr><tr><td>Category:</td><td><input name ='category' type='text' id='txt1' value="+category+"></td><td>Goes-in:</td><td><input name ='goesin'  type='text' id='txt1' value="+goesin+"></td><td style='width:60px;'></td><td><input name ='Enter' type='submit' value='Enter' style='float:right;'/></td></tr></table></fieldset></form>";  
		
		var table_name_canals=gid+category;
			
		var form2_canals = "<form enctype='multipart/form-data' action='upload_canal_table.php' method='post'><br/><fieldset><legend>TimeSeries Data</legend> <select name='typedb'>        <option value='notsel'>Select type</option>        <option value='inflow'>Inflow</option>               </select>    <div style='width:240px;'><input name='ufile2' type='file' size='28' id='ufile2'/></div>      <input type='hidden' name='imeto_za_tabela' value="+table_name_canals+"/>    <input type='submit' value='Upload' name='upload' />        </form></div>        <br/>        <p><span id='info'></span></p></fieldset>";
		
		var form3=" ";
		document.getElementById("form-id2").innerHTML=form3;                                                                                  
		document.getElementById("form-id").innerHTML=form_canals;
		document.getElementById("form-id1").innerHTML=form2_canals;
		remakeToUpdateButtons();;
		
		
	
		
    } 
});


 users.events.on({
    featureselected: function(event) {
        var feature = event.feature;
    	
		var id =feature.attributes.id;
  		var gid=feature.attributes.gid;
		var category = feature.attributes.category;
		var weight=feature.attributes.weight;
		
		
		var form_users="<div class='newform'><form name='frm'  onSubmit='mailme2users(this.form); return false;'><fieldset><legend><span class=''>1. Please input the attributes for the user </span></legend><table class='tablefrm1'><tr><td>Gid: </td><td><input name ='gid' type='text' id='txt1' value="+gid+"></td><td>ID: </td><td><input name ='id' type='text' id='txt1' value="+id+"></td><td>Weight: </td><td><input name ='weight' type='text' id='txt1' value="+weight+"></td></tr><tr><td>Category:</td><td><input name ='category' type='text' id='txt1' value="+category+"></td><td style='width:60px;'></td><td><input name ='Enter' type='submit' value='Enter' style='float:right;'/></td></tr></table></fieldset></form>";                                                                                    
		var table_name_user=gid+category;
			
		var form2 = "<form enctype='multipart/form-data' action='upload_user_table.php' method='post'><br/><fieldset><legend>TimeSeries Data</legend> <select name='typedb'>        <option value='notsel'>Select type</option>        <option value='inflow'>Inflow</option>               </select>    <div style='width:240px;'><input name='ufile2' type='file' size='28' id='ufile2'/></div>      <input type='hidden' name='imeto_za_tabela' value="+table_name_user+"/>    <input type='submit' value='Upload' name='upload' />                <br/>        <p><span id='info'></span></p></fieldset></form>";
		
		var form3=" ";
		document.getElementById("form-id2").innerHTML=form3;
		document.getElementById("form-id").innerHTML=form_users;
		document.getElementById("form-id1").innerHTML=form2;
		remakeToUpdateButtons();
    
		
		
    } 
});




inflows.events.on({
    featureselected: function(event) {
        var feature = event.feature;
    	
		var id =feature.attributes.id;
  		var gid=feature.attributes.gid;
		var category = feature.attributes.category;
		var name=feature.attributes.name;
		
		
		var form_inflows="<div class='newform'><form name='frm'  onSubmit='mailme2inflows(this.form); return false;'><fieldset><legend><span class=''>1. Please input the attributes for the inflow user </span></legend><table class='tablefrm1'><tr><td>Gid: </td><td><input name ='gid' type='text' id='txt1' value="+gid+"></td><td>ID: </td><td><input name ='id' type='text' id='txt1' value="+id+"></td><td>Name: </td><td><input name ='name' type='text' id='txt1' value="+name+"></td></tr><tr><td>Category:</td><td><input name ='category' type='text' id='txt1' value="+category+"></td><td style='width:60px;'></td><td><input name ='Enter' type='submit' value='Enter' style='float:right;'/></td></tr></table></fieldset></form>"
		                                                                                    
		var table_name_inflow=gid+category;
			
		var form2 = "<form enctype='multipart/form-data' action='upload_inflow_table.php' method='post'><br/><fieldset><legend>TimeSeries Data</legend> <select name='typedb'>        <option value='notsel'>Select type</option>        <option value='inflow'>Inflow</option>               </select>    <div style='width:240px;'><input name='ufile2' type='file' size='28' id='ufile2'/></div>      <input type='hidden' name='imeto_za_tabela' value="+table_name_inflow+"/>    <input type='submit' value='Upload' name='upload' />        </form></div>        <br/>        <p><span id='info'></span></p></fieldset>";
		
		var form3=" ";
		document.getElementById("form-id2").innerHTML=form3;
		document.getElementById("form-id").innerHTML=form_inflows;
		document.getElementById("form-id1").innerHTML=form2;
		remakeToUpdateButtons();
		
    } 
});




 land_agriculture.events.on({
    featureselected: function(event) {
        var feature = event.feature;
    	
		var id =feature.attributes.id;
  		var gid=feature.attributes.gid;
		var name_user = feature.attributes.name_user;
		var category = feature.attributes.category;
		var soil_type = feature.attributes.soil_type;
		var vegetation=feature.attributes.vegetation;
		
		
		var form_land_agriculture="<div class='newform'><form name='frm'  onSubmit='mailme2land_agriculture(this.form); return false;'><fieldset><legend><span class=''>1. Please input the attributes for the land_agriculture</span></legend><table class='tablefrm1'><tr><td>Gid: </td><td><input name ='gid' type='text' id='txt1' value="+gid+"></td><td>ID: </td><td><input name ='id' type='text' id='txt1' value="+id+"></td><td>Name_user: </td><td><input name ='name_user' type='text' id='txt1' value="+name_user+"></td></tr><tr><td>Category:</td><td><input name ='category' type='text' id='txt1' value="+category+"></td><td>Vegetation:</td><td><input name ='vegetation' type='text' id='txt1' value="+vegetation+"></td><td>Soil_type:</td><td><input name ='soil_type' type='text' id='txt1' value="+soil_type+"></td><td style='width:60px;'></td><td><input name ='Enter' type='submit' value='Enter' style='float:right;'/></td></tr></table></fieldset></form>"; 
		                                                                                   
		var table_name_land=gid+category;
			
		var form2 = "<form enctype='multipart/form-data' action='upload_land_table.php' method='post'><br/><fieldset><legend>TimeSeries Data</legend> <select name='typedb'>        <option value='notsel'>Select type</option>        <option value='inflow'>Inflow</option>               </select>    <div style='width:240px;'><input name='ufile2' type='file' size='28' id='ufile2'/></div>      <input type='hidden' name='imeto_za_tabela' value="+table_name_land+"/>    <input type='submit' value='Upload' name='upload' />        </form></div>        <br/>        <p><span id='info'></span></p></fieldset>";
		
		var form3=" ";
		document.getElementById("form-id2").innerHTML=form3;
		document.getElementById("form-id").innerHTML=form_land_agriculture;
		document.getElementById("form-id1").innerHTML=form2;
		remakeToUpdateButtons();
    } 
});



reservoir.events.on({
    featureselected: function(event) {
        var feature = event.feature;
    	
		var id =feature.attributes.id;
  		var gid=feature.attributes.gid;
		var name=feature.attributes.name;
		var category = feature.attributes.category;
		var max_volume=feature.attributes.max_volume;
		var min_volume=feature.attributes.min_volume;
	
	
	var form_reservoir="<div class='newform'><form name='frm'  onSubmit='mailme2reservoir(this.form); return false;'><fieldset><legend><span class=''>1. Please input the attributes for the reservoir</span></legend><table class='tablefrm1'><tr><td>Gid: </td><td><input name ='gid' type='text' id='txt1' value="+gid+"></td><td>ID: </td><td><input name ='id' type='text' id='txt1' value="+id+"></td><td>Name: </td><td><input name ='name' type='text' id='txt1' value="+name+"></td></tr><tr><td>Category:</td><td><input name ='category' type='text' id='txt1' value="+category+"></td><td>max_volume:</td><td><input name ='max_volume' type='text' id='txt1' value="+max_volume+"></td><td>min_volume:</td><td><input name ='min_volume' type='text' id='txt1' value="+min_volume+"></td><td style='width:60px;'></td><td><input name ='Enter' type='submit' value='Enter' style='float:right;'/></td></tr></table></fieldset></form>"
	                                                                                    

	
	
			
		var form2 = "<form id='uploadform' enctype='multipart/form-data' action='upload.php' method='post'>        <br/>    <select name='typedb' id='wroselect'>            <option value='notsel'>Select type</option>            <option value='storage'> Storage Discretization</option>            <option value='inflow'>Inflow</option>            <option value='demandtown'>Demand Towns</option>   <option value='demandagriculture'>Demand Agriculgure</option> <option value='demandecology'>Demand Ecology</option>         <option value='flood'>Flood</option>            <option value='recreation'>Recreation</option>            </select>                       <input name='ufile' type='file' size='28' id='ufile1' /> <input type='submit' value='Upload' name='upload' /><span id='status' style='display:none'>...</span><iframe id='target_iframe' name='target_iframe' src='' style='width:0;height:0;border:0px'></iframe></form>";
		
		var form3="<br/><input type = 'button'  value = 'Dynamic Programming alghorithm' onClick='myfuncdp()'><br/><input type = 'button'  value = 'Reinforcement Learning alghorithm' onClick='myfuncrl()'>";
		
			
		
		document.getElementById("form-id").innerHTML=form_reservoir;
		document.getElementById("form-id1").innerHTML=form2;
		document.getElementById("form-id2").innerHTML=form3;
		remakeToUpdateButtons();
		
	
	document.getElementById('uploadform').target = 'target_iframe';
    document.getElementById('status').style.display="block"; 
		
    } 
	
	
	
});




map.zoomToExtent(new OpenLayers.Bounds(21.0, 41.1, 23.4, 42.5));
}  



function myfuncdp()
{
$.post("javaExec.php", {the_jar: 'dp1.jar'}, function(data){  });
<?php
	//exec('java -jar dp1.jar');

	
?> //   var new_window = window.open("blagoj.php","html_name","width=200,height=200");
    var new_window = window.open("json-1.php","width=400,height=200");
}

function myfuncrl()
{
$.post("javaExec.php", {the_jar: 'rl1.jar'}, function(data){});
<?php
	//exec('java -jar rl1.jar');
	
?>

    //var new_window = window.open("blagoj.php","html_name","width=200,height=200");
    //var new_window = window.open("json-1.php","width=400,height=200");
}

// The bellow is for uploading files from reservoir (inflow, demand etc .. without refresing the page !!!!

function PopUpW()
{


    //var new_window = window.open("blagoj.php","html_name","width=200,height=200");
   var new_window = window.open("help.html","width=400,height=200");
}
function PopUpLogout()
{


    //var new_window = window.open("blagoj.php","html_name","width=200,height=200");
  // var new_window = window.open("logout.php","width=400,height=200");
  window.location.href="logout.php";
}



</script>
</head>

<body onLoad="init();remakeToUpdateButtons();">
	<div class="headtitle">    
   <input type = 'button'  align="right" value = ' How to use the application    ' onClick='PopUpW()'>
   <a href="addUsers.php"><input type='button' align="right" value='Add Users'></input></a>
   </span>
   <input type = 'button' class="olLogout" onClick='PopUpLogout()' value = ' Logout    '  align="left">
   <h2 id="title" style="margin-top:-15px;">
     <center>
     
      Web application for supporting water resources modeling 
     </center>
      </h2>
  
	
</div>
	<!--<div align="left" id="tags"></div>-->
	
    	<div id="map" class="smallmap"></div>
        <div id="output-id" style=""></div>
        <div style="height:40px; position:relative; z-index:10000">
        <div class="selectable-layer">
       <form name="edit_layers_select_menu">
        <label class="layerLabel" for="identifikator">Edit Layer:</label>
          <select name="identifikator" id="layer-select" onChange="init();remakeToUpdateButtons();">
          <option value="rivers">Rivers</option>
          <option value="canals">Canals</option>
          <option value="users">Users</option>
          <option value="reservoir">Reservoir</option>
          <option value="land_agriculture">Land Agriculture</option>
          <option value="inflows">Inflows</option>
          </select>
          </form>

         </div>
         </div>
        <!--<div id="txtHint"><b>Person info will be listed here.</b></div>-->
        <div id="tabs" style="font-size:14px;"> 

	<ul> 
		<li><a href="#form-id" rel="tab-link" onClick="" style="color:#790e0e; font-weight:500;">Attributes Info</a></li> 
		<li><a href="#form-id1" rel="tab-link" onClick="" style="color:#790e0e; font-weight:500;">TimeSeries Data</a></li> 
        <li><a href="#form-id2" rel="tab-link" onClick="" style="color:#790e0e; font-weight:500;">Optimization</a></li> 
	</ul>

    <div id="tab-body">
	<div id="form-id">
  
</div>

    <div id="form-id1">

    </div>
    <div id="form-id2">
	<?php
	include('formUploadCSV.php');	
	?>
    </div>
<br/>        
<p><span id="info"></span></p>

    </div>
    </div>
   
  
       
        
        
  </div>
  
</body>
</html>


