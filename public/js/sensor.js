var app2 = new Vue({

el: '#app2',
  data: {
    sensor : [

    ],
  },

   methods: {
   },


  created : function() {
    fetch('api/sensor.php')
    .then(function (response) {return response.json();})
    .then(function (json){
      app2.sensor = json;
       console.log(json);})
    .catch( function(err) {
      console.log('SENSOR LIST ERROR:');
      console.log(err);
    });
  }

});
