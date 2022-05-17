$(document).ready((function updateRecipe(){//start self-executing function
    setTimeout(function(){
        
        $.ajax({//start J query
            url:"recipe.json",
            type:"GET",
            dataType:"json",
            success:function(response){
                let sTxt="";//set variable sTxt
                $("#list").html("");//make relevant div blank
                $.each(response.Recipes,function(index){
                    
                   
                   //line 15 to 30 is to use $.each to loop every item to get data inside Recipes beside Method and Ingredients and make the relevant keys and tags to build the table which stores in sTxt
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
                   //line 32 to 40 is to get the array data sitting in the Method and ingredients 
                    for( let i=0 ; i<response.Recipes[index].Method.length;i++){
                        
                        sTxt += "<main><ul><li>"+"STEP"+(i+1)+"  "+response.Recipes[index].Method[i]+"</li></ul></main>";//add step number and every items inside array and make them in list
                    }
                       sTxt += "<h2>INGREDIENTS</h2>"//create head for ingredients
                    for( let i=0 ; i<response.Recipes[index].Ingredients.length;i++){
                        
                        sTxt += "<main><ul><li>"+response.Recipes[index].Ingredients[i]+"</li></ul></main>";//add every item inside array and make them list
                    }            
                });
                
                $("#list").append(sTxt);//Let the sTxt show on the div which has id=list
                updateRecipe();//call function again
               
            },
            error:function(){
                $("#updatemessage").html("<p>An error</p>");
            }
        });
    },250);//set time out to be 250 milliseconds
})());//self-executing function ends

