$(document).ready(function () {
  $('[id^="contactDeleteModal_"]').on('click', function (event) {

    event.preventDefault();

    let contactId = $(this).attr('id').split('_')[1];

    var deleteUrl = $(`#deleteUrl_${contactId}`).val();

    $.ajax({
      url: deleteUrl,
      type: 'DELETE',
      success: function (response) {

        $(`#contactDeleteModal_${contactId}`).modal('hide');
        $(`#contactRow_${contactId} td:nth-child(8)`).text(response.date);

        toastr.success('Contact deleted successfully!', 'Success');
      },
      error: function (xhr, status, error) {

        toastr.error("The contact wasn't deleted", 'Error');
        
      },

    });

  });
});
