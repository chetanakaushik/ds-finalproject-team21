var app2 = new Vue({

el: '#app2',
data: {
  sensor : [

  ],
  sensorForm: { },
},

 methods: {

   handleSensorForm : function(e) {

     const s = JSON.stringify(this.sensorForm);
     console.log(s);

     // POST to remote server
    fetch('api/sensor.php', {
      method: "POST", // *GET, POST, PUT, DELETE, etc.
      headers: {
          "Content-Type": "application/json; charset=utf-8"
      },
      body: s // body data type must match "Content-Type" header
    })
  .then(function (response) {return response.json();})
    .then(function (json){
      json = app2.sensor.push(json);
      console.log(json);
    })
    .catch( function(err)  {
      console.error('SENSOR POST ERROR:');
      console.error(err);
    });

    // Reset workForm
    this.sensorForm = this.getEmptyForm();
   },

   getEmptyForm : function(){
     return {
       sensor: null,
     };
   },

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
