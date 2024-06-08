$(document).ready(function () {
  $('#dataTable').DataTable({
    lengthMenu: [
      [5, 10, 25, 50, -1],
      [5, 10, 25, 50, 'Semua'],
    ],
    pageLength: 5,
    language: {
      // Mengubah teks default dalam DataTables
      paginate: {
        previous: 'Sebelumnya',
        next: 'Berikutnya',
      },
      info: 'Menampilkan _START_ hingga _END_ dari _TOTAL_ data',
      search: 'Cari :',
      lengthMenu: 'Tampilkan _MENU_ data',
      infoEmpty: 'Tidak ada data yang tersedia dari _MAX_ data',
      zeroRecords: 'Tidak ada data yang cocok',
      infoFiltered: '',
    },
  });
});
