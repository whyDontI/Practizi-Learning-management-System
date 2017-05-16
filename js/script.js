$(document).ready(function() {
    $('select').material_select();
  });

  $('.fixed-action-btn').openFAB();
  $('.fixed-action-btn').closeFAB();
  $('.fixed-action-btn.toolbar').openToolbar();
  $('.fixed-action-btn.toolbar').closeToolbar();

  $('select').material_select('destroy');

  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });

  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year
    min: true,
    onOpen: function () {
      this.clear();
    },
    onSet: function () {
      var x,y,year,date,month;
      x = $('.datepicker').pickadate().val().toString();
      y = x.split(/[ ,]+/);
      date = y[0];
      month = y[1];
      year = y[2];
      console.log(y[0]+" "+ y[1]+ " "+ y[2]);
      if(date && month && year){
        this.close();
      }
    }
  });

  // onSet: function (ele) {
  //  if(ele.select){
  //         this.close();
  //  }
  // }

  $('.datepicker').pickadate({
    onSet: function( arg ){
        if ( 'select' in arg ){ //prevent closing on selecting month/year
            this.close();
        }
    }
});

  // Initialize collapse button
  $(".button-collapse").sideNav();
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  $('.collapsible').collapsible();


  // $(document).ready(function(){
  //   // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
  //   $('.modal').modal();
  // });


  // $('.modal').modal({
  //     dismissible: true, // Modal can be dismissed by clicking outside of the modal
  //     opacity: .5, // Opacity of modal background
  //     inDuration: 300, // Transition in duration
  //     outDuration: 200, // Transition out duration
  //     startingTop: '4%', // Starting top style attribute
  //     endingTop: '10%', // Ending top style attribute
  //     ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
  //       alert("Ready");
  //       console.log(modal, trigger);
  //     },
  //     complete: function() { alert('Closed'); } // Callback for Modal close
  //   }
  // );


  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });


  $('.modal-trigger').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      starting_top: '4%', // Starting top style attribute
      ending_top: '10%', // Ending top style attribute
      ready: function() { alert('Ready'); }, // Callback for Modal open
      complete: function() { alert('Closed'); } // Callback for Modal close
    }
  );

   $('#pass_change').openModal();