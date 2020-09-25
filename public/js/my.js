$(document).ready(function(){
    
    fetch('https://coronavirus-19-api.herokuapp.com/countries/uzbekistan')
    .then(response => response.json())
    .then( function(data){
  
    $('.cases').html(data.cases)
    $('.deaths').html(data.deaths)
    $('.recovered').html(data.recovered)
    
    });
    
    

    if(location.href=="http://namanganliklar24.uz/"){
      setTimeout(function(){
        $('.layer').css('display', 'block');
      }, 40000)
    }
    
    function showLayer(){
      $('.layer').css('display', 'block');
    }
    setInterval(showLayer, 900000 );
    
    $('.hide-modal-btn').click(function(){
      $('.layer').css('display', 'none');
    })
})




