var app3 = new Vue({

el: '#app3',
  data: {
    turbine : [

    ],
  },

   methods: {
   },


  created : function() {

      // Do data fetch
       const url = new URL(window.location.href);
       const taskId = url.searchParams.get('turbineId');
       console.log('Turbine: '+ taskId);
       this.taskId = taskId;

       if (!taskId) {
         //TODO: Error? 404?
         //e.g., window.location = '404.html';
       }

       // TODO: Fetch task-specific data
       // fetch('api/task?id=4')
       fetch('api/turbine.php?turbineId='+taskId)
       .then(function (response) {return response.json();})
       .then(function (json){
         app3.turbine = json;
          console.log(json);})
       .catch( function(err) {
         console.log('TURBINE LIST ERROR:');
         console.log(err);
         });


    // fetch('api/turbine.php')
    // .then(function (response) {return response.json();})
    // .then(function (json){
    //   app3.turbine = json;
    //    console.log(json);})
    // .catch( function(err) {
    //   console.log('TURBINE LIST ERROR:');
    //   console.log(err);
    // });
  }

});
