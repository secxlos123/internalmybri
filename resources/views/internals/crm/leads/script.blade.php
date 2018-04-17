<script type="text/javascript">
  $(document).ready(function(){
    function kelolaan() {
      HoldOn.open(options);
      $.ajax({
        type: 'POST',
        url: '{{ url("leads_kelolaan") }}',
        headers: {
          "X-CSRF-TOKEN": "{{ csrf_token() }}"
        }
      }).done(function(response){
        $('#kelolaans').html(response);
        $('#tableKelolaan').dataTable();
        HoldOn.close();
      }).fail(function(errors){
        alert("Gagal Terhubung ke Server");
        HoldOn.close();
      });
    }

    kelolaan();

    function leads(type_usulan) {
      HoldOn.open(options);
      $.ajax({
        type: 'POST',
        url: '{{ url("leads_leads") }}',
        data: {
          type_usulan : type_usulan
        },
        headers: {
          "X-CSRF-TOKEN": "{{ csrf_token() }}"
        }

      }).done(function(response){
        // console.log(response);
        $('#leads').html(response);
        $('#tableLeads').dataTable();
        HoldOn.close();
      }).fail(function(errors){
        alert("Gagal Terhubung ke Server");
        HoldOn.close();
      });
    }

    function customer() {
      HoldOn.open(options);
      $.ajax({
        type: 'POST',
        url: '{{ url("leads_customer") }}',
        headers: {
          "X-CSRF-TOKEN": "{{ csrf_token() }}"
        }

      }).done(function(response){
        // console.log(response);
        $('#customers').html(response);
        $('#tableCustomers').dataTable();
        HoldOn.close();
      }).fail(function(errors){
        alert("Gagal Terhubung ke Server");
        HoldOn.close();
      });
    }

    function cpp() {
      HoldOn.open(options);
      $.ajax({
        type: 'POST',
        url: '{{ url("leads_cpp") }}',
        headers: {
          "X-CSRF-TOKEN": "{{ csrf_token() }}"
        }

      }).done(function(response){
        // console.log(response);
        $('#cpps').html(response);
        $('#tableCpp').dataTable();
        HoldOn.close();
      }).fail(function(errors){
        alert("Gagal Terhubung ke Server");
        HoldOn.close();
      });
    }

    function referral() {
      HoldOn.open(options);
      $.ajax({
        type: 'POST',
        url: '{{ url("leads_referral") }}',
        headers: {
          "X-CSRF-TOKEN": "{{ csrf_token() }}"
        }

      }).done(function(response){
        // console.log(response);
        $('#referrals').html(response);
        $('#tableReferral').dataTable();
        HoldOn.close();
      }).fail(function(errors){
        alert("Gagal Terhubung ke Server");
        HoldOn.close();
      });
    }


    $('#leadsBtn').on('click', function(){
      if ($('#leads').text().length <= 0) {
        leads('kpr');
      }
    });

    $('#customersBtn').on('click', function(){
      if ($('#customers').text().length <= 0) {
        customer();
      }
    });

    $('#cppsBtn').on('click', function(){
      if ($('#cpps').text().length <= 0) {
        cpp();
      }
    });

    $('#referralsBtn').on('click', function(){
      if ($('#referrals').text().length <= 0) {
        referral();
      }
    });

    $('#selectLeads').on('change', function(){
      leads($(this).val());
    });


  });
</script>
