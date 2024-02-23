function updatee(event) {
  event.preventDefault();

  const deleteLink = event.currentTarget; // sử dụng this để lấy phần tử được kích hoạt
  const path = deleteLink.getAttribute('href');

  Swal.fire({
      title: "Bạn có chắc muốn hủy đơn hàng?",
      text: "Bạn sẽ không thể khôi phục điều này!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Thoát",
      confirmButtonText: "Hủy đơn hàng"
  }).then((result) => {
      if (result.value) {
          document.location.href = path;
      }
  });
}

function update_2(event) {
  event.preventDefault();

  const deleteLink = event.currentTarget; // sử dụng this để lấy phần tử được kích hoạt
  const path = deleteLink.getAttribute('href');

  Swal.fire({
      title: "Bạn có chắc muốn mua hàng?",
      text: "Bạn sẽ sẽ mua đơn hàng này!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Thoát",
      confirmButtonText: "Mua"
  }).then((result) => {
      if (result.value) {
          document.location.href = path;
      }
  });
}

function deletee(event) {
  event.preventDefault();

  const deleteLink = event.currentTarget; // sử dụng this để lấy phần tử được kích hoạt
  const path = deleteLink.getAttribute('href');

  Swal.fire({
      title: "Bạn có chắc muốn xóa?",
      text: "Bạn sẽ không thể khôi phục điều này!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Thoát",
      confirmButtonText: "Xóa"
  }).then((result) => {
      if (result.value) {
          document.location.href = path;
      }
  });
}

function changeTab(tabIndex) {
    document.querySelectorAll('.tab-content').forEach(function (content) {
      content.classList.remove('active');
    });
  
    document.getElementById(`tabContent${tabIndex}`).classList.add('active');
  
  
    document.querySelectorAll('.tab').forEach(function (tab) {
      tab.classList.remove('active');
    });
  
  
    document.querySelector(`.tab:nth-child(${tabIndex + 1})`).classList.add('active');
  }
  
  