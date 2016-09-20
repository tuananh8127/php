<!-- Hôm nay tôi xin chia sẽ một bài viết  về Làm thế nào để tìm kiếm bằng nhận dạng giọng nói giống công cụ tìm kiếm bằng giộng nói của Google. Ngày nay hầu hết mọi người đang sử dụng công cụ tìm kiếm nhận dạng giọng nói, đặc biệt là điện thoại di động. Ở đây tôi xin chia sẻ một đoạn code rất đơn giản bằng ngôn ngữ Javascript chuyển đổi giọng nói thành văn bản -->

<!--trước tiên bạn tạo một form tìm kiếm bằng html-->
<!-- form có id là form_id phương thức dữ liệu tạm thời để trống -->
<!-- bên trong form có các trường dữ liệu input có id="search_box"-->
<form id="form_id" method="">
<div class="speech_box">
<input type="text" name="voice" id="search_box" placeholder="Speak">
<input name="sitesearch" type="hidden" value="">
<img onclick="function_voice()" src="//i.imgur.com/cHidSVu.gif">
</div>
</form>

<script>



function function_voice(){
		if(window.hasOwnProperty('webkitSpeechRecognition')) {
			//hasOwnProperty là phương thức javascript để kiểm tra đối tượng đó có tồn tại thuộc tính đó hay không//
			//nói cách khác nó kiểm tra thuộc tính của một đối tượng 
			var recognition = new webkitSpeechRecognition();
			// webkitSpeechRecognition cho phép người dùng truy cập vào dòng âm thanh của trình duyệt
			// và chuyển nó thành dạng văn bản
			recognition.continuous = false;
			recognition.interimResults = false;
			// interimResult đầu tiên sẽ là  sai  có nghĩa kết quả trả về của bộ nhận dạng là cuối cùng và sẽ không thay đổi
			//có nghĩa kết quả sẽ được trả về sau khi nhận dạng đã kết thúc
			recognition.lang = 'en-US';
			//Thiết lập ngôn ngữ
			recognition.start();
			//bắt đầu
			recognition.onresult = function(e) {
				document.getElementById('search_box').value = e.results[0][0].transcript;
				recognition.stop();
				// document.getElementById('form_id').submit();
			};
			recognition.onerror = function(e) {
				recognition.stop();
			}
		}
}

</script>
