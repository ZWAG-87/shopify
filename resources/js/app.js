require('./bootstrap');

require('alpinejs');

import Swal from "sweetalert2";
window.suppressionConfirm = function(formId){

    Swal.fire({
        title: 'Etes vous sûr?',
        text: "Etes vous sûr de supprimer ce produit? Cette action est irréversible!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Annuler',
        confirmButtonText: 'Supprimer!'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById(formId).submit();
        }
      })

}
