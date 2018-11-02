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

   gotoTask : function(tid) {
      window.location = 'turbine.html?turbineId=' + tid;
    }

 },


created : function() {

  // Do data fetch
   const url = new URL(window.location.href);
   const taskId = url.searchParams.get('siteId');
   console.log('TurbineDeployed: '+ taskId);
   this.taskId = taskId;

   if (!taskId) {
     //TODO: Error? 404?
     //e.g., window.location = '404.html';
   }

   // TODO: Fetch task-specific data
   // fetch('api/task?id=4')
   fetch('api/turbineDeployed.php?siteId='+taskId)
   .then( response => response.json() )
   .then( json => {app4.turbineDeployed = json} )
   .catch( err => {
     console.log('TURBINE DEPLOYED FETCH ERROR:');
     console.log(err);
   })

  // fetch('api/turbineDeployed.php')
  // .then(function (response) {return response.json();})
  // .then(function (json){
  //   app4.turbineDeployed = json;
  //    console.log(json);})
  // .catch( function(err) {
  //   console.log('TURBINE DEPLOYED LIST ERROR:');
  //   console.log(err);
  // });

}

});
