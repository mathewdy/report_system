$(document).ready(function(){
    $('.brgy').tokenfield({
        autocomplete :{
            source: function(data, response){
                $.ajax({
                    url: 'brgy.php',
                    method: 'GET',
                    dataType: 'json',
                    data: {
                    name: data.term
                    },
                    success: function(res){
                    // response(res)
                    var usr = $.map(res, function(name){
                        return{
                        label: name,
                        value: name
                        }
                    }) 
                    var results = $.ui.autocomplete.filter(usr, data.term)
                    response(results)
                    console.log(results)
                    }
                })
            }
        }
    });
});