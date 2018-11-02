var app4 = new Vue({

el: '#app4',
data: {
  turbineDeployed : [

  ],
  turbineDeployedForm: { },
},

 methods: {

   handleturbineDeployedForm : function(e) {

     const s = JSON.stringify(this.turbineDeployedForm);
     console.log(s);

     // POST to remote server
    fetch('api/turbineDeployed.php', {
      method: "POST", // *GET, POST, PUT, DELETE, etc.
      headers: {
          "Content-Type": "application/json; charset=utf-8"
      },
      body: s // body data type must match "Content-Type" header
    })
  .then(function (response) {return response.json();})
    .then(function (json){
      json = app4.turbineDeployed.push(json);
      console.log(json);
    })
    .catch( function(err)  {
      console.error('TURBINE DEPLOYED POST ERROR:');
      console.error(err);
    });

    // Reset workForm
    this.turbineDeployedForm = this.getEmptyForm();
   },

   getEmptyForm : function(){
     return {
       turbineDeployed: null,
     };
   },

 },


created : function() {
  fetch('api/turbineDep_all.php')
  .then(function (response) {return response.json();})
  .then(function (json){
    app4.turbineDeployed = json;
     console.log(json);})
  .catch( function(err) {
    console.log('TURBINE DEPLOYED LIST ERROR:');
    console.log(err);
  });
}

});
