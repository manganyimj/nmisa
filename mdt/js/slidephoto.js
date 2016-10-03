var prof_pic = 'm';
			 
			 function change(){
			    var image = document.getElementById('social');
				if(prof_pic == 'm'){
				   image.src = '../images/events/event.png';
				   prof_pic = 'v';
				}
				else if(prof_pic == 'v')
				    {
					   image.src = 'images/brouchers/spar1.jpg';
					   prof_pic = 'j';
					}else if(prof_pic == 'j')
					     {
						      image.src = '../events/event.png';
					          prof_pic = 'k';
						 }
						   else{
						        image.src = 'images/brouchers/spar1.jpg';
					             prof_pic = 'm';
						 }			
			  }
			  var timer = setInterval('change()',5000);