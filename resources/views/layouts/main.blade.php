
@extends('index')
@section('content')
<div class="about">
	<div class="container">
		<div class="about-main">
			<div class="col-md-8 about-left">
				<div class="about-one">
					<p>Blog Nhịp Sống Khỏe</p>
					<h3>Thực phẩm hữu cơ (Organic) - “gương mặt vàng trong làng” chăm sóc sức khỏe</h3>
				</div>
				<div class="about-two">
					<a href=""><img src="https://www.prudential.com.vn/export/sites/prudential-vn/vi/.thu-vien/hinh-anh/pulse-nhip-song-khoe/song-khoe/2020/suc-khoe-the-chat/bai-viet-ban-co-biet-thuc-pham-sach-va-thuc-pham-organic-la-hai-loai-khac-nhau-01.png" alt="" /></a>
					<p>Đăng bởi <a href="#">Traan Nam</a> 09/12/2023 <a href="#">Bình luận (2)</a></p>
					
					<p>Do được nuôi trồng một cách tự nhiên, các loại thực phẩm Organic không cần dùng thuốc trừ sâu, hoá chất, giúp đất và nước không bị ô nhiễm, làm giảm ô nhiễm môi trường, kiểm soát xói mòn đất cũng như tăng khả năng sinh sản của sinh vật có lợi cho môi trường, tiêu tốn ít năng lượng.</p>
					<p>Đồng thời, nhờ vào quá trình trồng tự nhiên nên mùi, hương thơm và thành phần dinh dưỡng trong thực phẩm hữu cơ vẫn được duy trì với tỷ lệ cao. Theo các chuyên gia, thực phẩm organic có hàm lượng dinh dưỡng cao hơn 15% so với thực phẩm thông thường. Một số nghiên cứu khoa học cũng chỉ ra rằng hoa quả và rau hữu cơ chứa chất chống oxy hoá nhiều hơn 40% so với các sản phẩm không hữu cơ. Do vậy, các loại thực phẩm này có hiệu quả trong việc giảm nguy cơ bệnh tim, ung thư, đường huyết cao. Tuy nhiên, do không chứa chất bảo quản nên loại thực phẩm này không để được quá lâu và cần tiêu thụ càng nhanh càng tốt.</p>
					<div class="about-btn">
						<a href="#">Đọc thêm</a>
					</div>
					<ul>
						<li><p>Chia sẻ : </p></li>
						<li><a href="#"><span class="fb"> </span></a></li>
						<li><a href="#"><span class="twit"> </span></a></li>
						<li><a href="#"><span class="pin"> </span></a></li>
						<li><a href="#"><span class="rss"> </span></a></li>
						<li><a href="#"><span class="drbl"> </span></a></li>
					</ul>
				</div>
				<div class="about-tre">
					<div class="a-1" >
						<h2 style="font-weight: bold;color: brown;">Danh sách thực phẩm</h2>
						@foreach ($products as $product)
						<div class="col-md-6 abt-left" style="padding-bottom:10px">
							<a href="{{url('/product/'.$product->id)}}"><img src="{{$product->image}}" alt="" /></a>
							<h3 style="font-weight: bold;"><a href="{{url('/product/'.$product->id)}}">{{$product->name}}</a></h3>
							@if($product->getPrice())
							<h2 style="font-weight: bold;color: brown;">{{$product->price}}</h2>
							@else
							<h3 style="font-weight: bold;color: brown;">Liên hệ</h3>
							@endif
							<div class="wrapper">
							<p>{{$product->desc}}</p>
							</div>
							<div class="about-btn" style="text-align-last: right;">
								<a href="{{url('/product/'.$product->id)}}">Chi tiết</a>
							</div>
							<br>
						</div>
						@endforeach
						
						<div class="clearfix"></div>
					</div>
				</div>	
			</div>
			<div class="col-md-4 about-right heading">
				<div class="abt-1">
					<h3>ABOUT US</h3>
					<div class="abt-one">
						<img src="http://file.freshfoods.vn/global/z4470399861689e035d4fc4eff57a8493800c4a707fe5c.jpg" alt="" width="300px" />
						<h4>STEAK OUSHII BEEF PHÙ HỢP VỚI MỌI LỨA TUỔI</h4>
						<p>Điều khiến bạn hài lòng khi thưởng thức một món ăn ngon đó có phải là độ mềm khi nhai kết hợp cùng hương vị tinh tế như "đánh thức mọi giác quan" và hậu vị lưu luyến không lẫn vào đâu được? Nếu bạn đang tìm kiếm trải nghiệm ẩm thực như vậy, thì Steak Oushii Beef chính là sự lựa chọn không thể bỏ qua. Hãy để chúng tôi dẫn lối bạn vào hành trình của hương vị tinh tế, nơi mỗi lát thịt mềm mại đều đem đến một trải nghiệm ẩm thực đẳng cấp.</p>
						<div class="a-btn">
							<a href="single.html">Read More</a>
						</div>
					</div>
				</div>
				<div class="abt-2">
					<h3>YOU MIGHT ALSO LIKE</h3>
						<div class="might-grid">
							<div class="grid-might">
								<a href="single.html"><img src="https://thucphamsach.vn/wp-content/uploads/2021/07/cach-lam-ca-hoi-nuong-pho-mai-664x374.jpg" class="img-responsive" alt=""> </a>
							</div>
							<div class="might-top">
								<h4><a href="single.html">Cách làm cá hồi nướng phô mai thơm ngon béo ngậy</a></h4>
								<p>Cá hồi nướng phô mai thơm ngon, béo ngậy là món ăn có sự kết hợp giữa vị thịt tươi của cá hồi với vị béo của phô mai. Món ăn dinh dưỡng này vô cùng đơn giản.</p> 
							</div>
							<div class="clearfix"></div>
						</div>	
						<div class="might-grid">
							<div class="grid-might">
								<a href="single.html"><img src="https://thucphamsach.vn/wp-content/uploads/2021/07/cach-chon-ca-hoi-song-290x180-c-default.jpg" class="img-responsive" alt=""> </a>
							</div>
							<div class="might-top">
								<h4><a href="single.html">Bạn biết gì về cá hồi sống? Ăn cá hồi sống có tốt không?</a></h4>
								<p> Bạn biết gì về cá hồi sống? Ăn cá hồi sống có tốt không?</p> 
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="might-grid">
							<div class="grid-might">
								<a href="single.html"><img src="https://thucphamsach.vn/wp-content/uploads/2021/07/ca-hoi-ap-chao-sot-tieu-den-290x180-c-default.jpg" class="img-responsive" alt=""> </a>
							</div>
							<div class="might-top">
								<h4><a href="single.html">Hướng dẫn làm cá hồi áp chảo sốt tiêu đen</a></h4>
								<p> Cá hồi được biết đến là thực phẩm dinh dưỡng và giàu protein. Chính vì điều đó, cá hồi trở thành món ăn được sử dụng phổ biến và dần trở thành món ăn được yêu thích của nhiều người</p> 
							</div>
							<div class="clearfix"></div>
						</div>							
				</div>

				
			</div>
			<div class="clearfix"></div>			
		</div>		
	</div>
</div>
@endsection