var app5 = new Vue({

el: '#app5',
data: {
  sensorDeployed : [

  ],
  sensorDeployedForm: { },
},

 methods: {

   handleSensorDeployedForm : function(e) {

     const s = JSON.stringify(this.sensorDeployedForm);
     console.log(s);

     // POST to remote server
    fetch('api/sensorDeployed.php', {
      method: "POST", // *GET, POST, PUT, DELETE, etc.
      headers: {
          "Content-Type": "application/json; charset=utf-8"
      },
      body: s // body data type must match "Content-Type" header
    })
  .then(function (response) {return response.json();})
    .then(function (json){
      json = app5.sensorDeployed.push(json);
      console.log(json);
    })
    .catch( function(err)  {
      console.error('SENSOR DEPLOYED POST ERROR:');
      console.error(err);
    });

    // Reset workForm
    this.sensorDeployedForm = this.getEmptyForm();
   },

   getEmptyForm : function(){
     return {
       sensorDeployed: null,
     };
   },

 },


created : function() {
  fetch('api/sensorDeployed.php')
  .then(function (response) {return response.json();})
  .then(function (json){
    app5.sensorDeployed = json;
     console.log(json);})
  .catch( function(err) {
    console.log('SENSOR DEPLOYED LIST ERROR:');
    console.log(err);
  });
}

});
