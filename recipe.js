$(document).ready((function updateRecipe(){
    setTimeout(function(){
        
        $.ajax({
            url:"recipe.json",
            type:"GET",
            dataType:"json",
            success:function(response){
               
               
                let mTxt="";
                let sTxt="";
                let iTxt="";
                let wTxt="";
                $("#list").html("");
                let nu=response.Recipes;
                
                
                
                $.each(response.Recipes,function(index){
                    
                   
                   
                   sTxt +="<h2>RECIPE</h2><table><tr><td>"+"id: "+response.Recipes[index].id+"</tr></td>"
                   +"<tr><td>"+"title: "+response.Recipes[index].title+"</tr></td>"
                   +"<tr><td>"+"pre time(minutes): "+response.Recipes[index].preptime+"</tr></td>"
                   +"<tr><td>"+"cook time(minutes): "+response.Recipes[index].cooktime+"</tr></td>"
                   +"<tr><td>"+"complexity: "+response.Recipes[index].complexity+"</tr></td>"
                   +"<tr><td>"+"serves: "+response.Recipes[index].serves+"</tr></td>"
                   +"<tr><td>"+"introduction: "+response.Recipes[index].intruduction+"</tr></td>"
                   +"<tr><td>"+"Nutrition: "+"</tr></td>"
                   +"<tr><td>"+"kcal: "+response.Recipes[index].Nutrition.kcal+"</tr></td>"
                   +"<tr><td>"+"fat(g): "+response.Recipes[index].Nutrition.fat+"</tr></td>"
                   +"<tr><td>"+"saturates(g): "+response.Recipes[index].Nutrition.saturates+"</tr></td>"
                   +"<tr><td>"+"carbs(g): "+response.Recipes[index].Nutrition.carbs+"</tr></td>"
                   +"<tr><td>"+"sugars(g): "+response.Recipes[index].Nutrition.sugars+"</tr></td>"
                   +"<tr><td>"+"fibre(g): "+response.Recipes[index].Nutrition.fibre+"</tr></td>"
                   +"<tr><td>"+"protein(g): "+response.Recipes[index].Nutrition.protein+"</tr></td>"
                   +"<tr><td>"+"salt(g): "+response.Recipes[index].Nutrition.salt+"</tr></td></table><h2>METHODS</h2>";
                    for( let i=0 ; i<response.Recipes[index].Method.length;i++){
                        
                        sTxt += "<main><ul><li>"+"STEP"+(i+1)+"  "+response.Recipes[index].Method[i]+"</li></ul></main>";
                    }
                       sTxt += "<h2>INGREDIENTS</h2>"
                    for( let i=0 ; i<response.Recipes[index].Ingredients.length;i++){
                        
                        sTxt += "<main><ul><li>"+response.Recipes[index].Ingredients[i]+"</li></ul></main>";
                    }
                    

                     console.log(response.Recipes[index].Nutrition.kcal);

                     


                  
                    
                    
                
                    
                });
                
                $("#list").append(sTxt);
               
            },
            error:function(){
                $("#updatemessage").html("<p>An error</p>");
            }
        });
    },2500);
})());

