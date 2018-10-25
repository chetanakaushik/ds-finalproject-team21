var app3 = new Vue({

el: '#app3',
  data: {
    turbine : [

    ],
  },

   methods: {
   },


  created : function() {
    fetch('api/turbine.php')
    .then(function (response) {return response.json();})
    .then(function (json){
      app3.turbine = json;
       console.log(json);})
    .catch( function(err) {
      console.log('TURBINE LIST ERROR:');
      console.log(err);
    });
  }

});
