
		//array init
		var keeper = [[0, 'answer', 'pick', 'course']];
		keeper.shift(); //removes the first data
		
		
		var scorekard = [[uCos1, 0], [uCos2, 0], [uCos3, 0], [uCos4, 0], ['total', 0]];
		//scorekard.shift();
			
		//checks if a question number has already been stored
		function qNumExist(f){
			
			var find = f;
			var fpack =  new Array();
			var found;
			
			fpack[0] = false;
			
			for (var y = 0; y < this.keeper.length; y++){
				for (var j = 0; j < this.keeper[y].length; j++){
					if(this.keeper[y][0] == find)
					{
						fpack[0] = true;
						fpack[1] = this.keeper[y][0];
						fpack[2] = this.keeper[y][2];
												
						break;
					}
				}
			}
			
			
			return fpack;
		}
				
		//upating an already registered value
		function qNumUpdate(f, pick){
			
			var find = f;
						
			for (var y = 0; y < this.keeper.length; y++){
				for (var j = 0; j < this.keeper[y].length; j++){
					if(this.keeper[y][0] == find)
					{
						
						this.keeper[y][2] = pick;
												
						return true;
					}
				}
			}
			
			return false;
		}
		
		//stores the answers	
		function store(pos, correct, pick, course){
			
			var check = qNumExist(pos);
			
			if( check[0] == false){
				
				this.keeper.push([pos, correct, pick, course]);
			}else{
				
				var eNum = check[1];
				
				done = qNumUpdate(eNum, pick);
				
			//	if(done)
				//alert('Updated!');
			}
		}
		
		//temp: shows data stored
		function show(){
			
			for (var y = 0; y < this.keeper.length; y++){
				for (var j = 0; j < this.keeper[y].length; j++){
					
					console.log(this.keeper[y][j]);
				//	console.log(this.keeper[y][0]);
				}			
			}	
		}
		
		//sets the cookies
		function setCookie(cname, cvalue, exdays) {
			var d = new Date();
			d.setTime(d.getTime() + (exdays*24*60*60*1000));
			var expires = "expires="+d.toUTCString();
			document.cookie = cname + "=" + cvalue + "; " + expires;
		}

		
		//Grader: marks and stores the score in a cookie for a short term
		function grader(){
			
			var fpack =  new Array();
			fpack[0] = false;;
			exdays = 1;
			
			for (var y = 0; y < this.keeper.length; y++){
				for (var j = 0; j < this.keeper[y].length; j++){
					
					if(this.keeper[y][3] == uCos1)
					{				
						this.scorekard[0][1] += (this.keeper[y][1] == this.keeper[y][2])? 1 : 0;
					}else if (this.keeper[y][3] == uCos2){
					
						this.scorekard[1][1] += (this.keeper[y][1] == this.keeper[y][2])? 1 : 0;
					}else if (this.keeper[y][3] == uCos3){
					
						this.scorekard[2][1] += (this.keeper[y][1] == this.keeper[y][2])? 1 : 0;
					}else if (this.keeper[y][3] == uCos4){
					
						this.scorekard[3][1] += (this.keeper[y][1] == this.keeper[y][2])? 1 : 0;
					}					
				}					
			}
			
			
			this.scorekard[4][1] = (this.scorekard[0][1] + this.scorekard[1][1] + this.scorekard[2][1] + this.scorekard[3][1]); //stores the grand total	
			
			fpack[0] = true;
			
			val1 = this.scorekard[0][1];
			val2 = this.scorekard[1][1];
			val3 = this.scorekard[2][1];
			val4 = this.scorekard[3][1];
			 sum = this.scorekard[4][1];
			numQuest = (range * 4);
			
			setCookie('course1', val1, this.exdays);
			setCookie('course2', val2, this.exdays);
			setCookie('course3', val3, this.exdays);
			setCookie('course4', val4, this.exdays);
			setCookie('total', sum, this.exdays);
			setCookie('totalQuest', numQuest, this.exdays);
			
			return fpack;
		}
	

		//jquery scripts
		$(document).ready(function(){
			
			init(); // displays the first question for the session

			
			//checking and unchecking radio buttons
			function radioCheck(pos)
			{
				var radioStatus = qNumExist(pos);
				var radboo = radioStatus[0];
				var radbutton =  radioStatus[2];
			//	var radbutton =  radioStatus[2].toString();
				
				if(radboo == true)
				{
					var radix = radbutton;
					
					switch(radix)
					{
					 case "A":					 
							$("#optA").prop("checked", true);				
						break;
					 case "B":
							$("#optB").prop("checked", true);
						break;
					 case "C":
							$("#optC").prop("checked", true);
						break;
					 case "D":
							$("#optD").prop("checked", true);
						break;
					 default:						
							$(":radio").prop("checked", false);
						break;
					}
				}else{
							$(":radio").prop("checked", false);
				}
				
			}
			
			//navigation		
			$("#next").click(function(){
				
				nextNav();				
				radioCheck(num);				
			});
			$("#prev").click(function(){
				
				prevNav();
				radioCheck(num);			
			});	
			
			//radio setters
			$("#optA").click(function(){				
				
				store(num, jAns, 'A', jCos);
			});			
			$("#optB").click(function(){				
				
				store(num, jAns, 'B', jCos);
			});
			$("#optC").click(function(){
			
				store(num, jAns, 'C', jCos);
			});
			$("#optD").click(function(){
			
				store(num, jAns, 'D', jCos);
			});
			$("#stopExam").click(function(){
				
				var epack = grader();
				
				if(epack[0] == true)
					window.location.replace("bionic.php?view=result");
			});
			
		
		});