<?php
namespace LFR;

class FL_PostForum{

	public $shortcode = 'filter_home';
	public $shortcode2 = 'filter_widget';

	public function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_filter' ) );
		add_shortcode( $this->shortcode, array( $this, 'filter_home' ) );
		add_shortcode( $this->shortcode2, array( $this, 'filter_widget' ) );

	}

	public function enqueue_filter() {
		wp_enqueue_style( 'lfr_css', FL_URL . 'assets/filter.css', '', FL_VER );
		wp_enqueue_script( 'lfr_js', FL_URL . 'assets/filter.js', array( 'jquery' ), FL_VER, true );
		wp_localize_script( 'lfr_js', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
	}

	public function filter_home() {
		ob_start();
		$this->content_shortcode_home();
		return ob_get_clean();
	}

	public function content_shortcode_home(){
		$loai_tin = isset($_GET['loai_tin_3']) ? $_GET['loai_tin_3'] : '';
		$thanh_pho = isset($_GET['thanh_pho_4']) ? $_GET['thanh_pho_4'] : '';
		$quan_huyen_hn = isset($_GET['quan_huyen_hn_5']) ? $_GET['quan_huyen_hn_5'] : '';
		$quan_huyen_hcm = isset($_GET['quan_huyen_hcm_6']) ? $_GET['quan_huyen_hcm_6'] : '';
		$loai_bds = isset($_GET['loai_bds_7']) ? $_GET['loai_bds_7'] : '';
		$dien_tich = isset($_GET['dien_tich_8']) ? $_GET['dien_tich_8'] : '';
		$khoang_gia = isset($_GET['khoang_gia_9']) ? $_GET['khoang_gia_9'] : '';
		?>
		<form class="filter_home" method="get" action="<?php echo home_url( ).'/filter'; ?>">
			<div class="loai_tin f_row">
				<select class="loai_tin" name="loai_tin_3">
					<option value="">Loại tin</option>
					<option value="BĐS Bán">BĐS Bán</option>
					<option value="BĐS Cho Thuê">BĐS Cho Thuê</option>
				</select>
			</div>
			<div class="thanh_pho f_row">
				<select id="thanh_pho" name="thanh_pho_4">
					<option value="">Tỉnh/Thành phố</option>
					<option value="Hà Nội">Hà Nội</option>
					<option value="TPHCM">TPHCM</option>
				</select>
			</div>
			<div id="quan_huyen" class="f_row">
				<select class="quan_huyen">
					<option value="">Chọn quận</option>
				</select>
			</div>
			<div id="quan_huyen_hn" class="f_row">
				<select class="quan_huyen_hn" name="quan_huyen_hn_5">
					<option value="">Chọn quận Hà Nội</option>
					<option value="Quận Ba Đình">Quận Ba Đình</option>
					<option value="Quận Bắc Từ Liêm">Quận Bắc Từ Liêm</option>
					<option value="Quận Cầu Giấy">Quận Cầu Giấy</option>
					<option value="Quận Đống Đa">Quận Đống Đa</option>
					<option value="Quận Hai Bà Trưng">Quận Hai Bà Trưng</option>
					<option value="Quận Hoàn Kiếm">Quận Hoàn Kiếm</option>
					<option value="Quận Hà Đông">Quận Hà Đông</option>
					<option value="Quận Hoàng Mai">Quận Hoàng Mai</option>
					<option value="Quận Long Biên">Quận Long Biên</option>
					<option value="Quận Nam Từ Liêm">Quận Nam Từ Liêm</option>
					<option value="Quận Tây Hồ">Quận Tây Hồ</option>
					<option value="Quận Thanh Xuân">Quận Thanh Xuân</option>
					<option value="Huyện Ba Vì">Huyện Ba Vì</option>
					<option value="Huyện Chương Mỹ">Huyện Chương Mỹ</option>
					<option value="Huyện Đan Phượng">Huyện Đan Phượng</option>
					<option value="Huyện Đông Anh">Huyện Đông Anh</option>
					<option value="Huyện Gia Lâm">Huyện Gia Lâm</option>
					<option value="Huyện Hoài Đức">Huyện Hoài Đức</option>
					<option value="Huyện Mê Linh">Huyện Mê Linh</option>
					<option value="Huyện Mỹ Đức">Huyện Mỹ Đức</option>
					<option value="Huyện Phúc Thọ">Huyện Phúc Thọ</option>
					<option value="Huyện Phú Xuyên">Huyện Phú Xuyên</option>
					<option value="Huyện Quốc Oai">Huyện Quốc Oai</option>
					<option value="Huyện Sóc Sơn">Huyện Sóc Sơn</option>
					<option value="Huyện Thạch Thất">Huyện Thạch Thất</option>
					<option value="Huyện Thanh Oai">Huyện Thanh Oai</option>
					<option value="Huyện Thanh Trì">Huyện Thanh Trì</option>
					<option value="Huyện Thường Tín">Huyện Thường Tín</option>
					<option value="Huyện Ứng Hòa">Huyện Ứng Hòa</option>
					<option value="Thị Xã Sơn Tây">Thị Xã Sơn Tây</option>
				</select>
			</div>
			<div id="quan_huyen_hcm" class="f_row">
				<select class="quan_huyen_hcm" name="quan_huyen_hcm_6">
					<option value="">Chọn quận HCM</option>
					<option value="Quận 1">Quận 1</option>
					<option value="Quận 2">Quận 2</option>
					<option value="Quận 3">Quận 3</option>
					<option value="Quận 4">Quận 4</option>
					<option value="Quận 5">Quận 5</option>
					<option value="Quận 6">Quận 6</option>
					<option value="Quận 7">Quận 7</option>
					<option value="Quận 8">Quận 8</option>
					<option value="Quận 9">Quận 9</option>
					<option value="Quận 10">Quận 10</option>
					<option value="Quận 11">Quận 11</option>
					<option value="Quận 12">Quận 12</option>
					<option value="Quận Bình Tân">Quận Bình Tân</option>
					<option value="Quận Gò Vấp">Quận Gò Vấp</option>
					<option value="Quận Phú Nhuận">Quận Phú Nhuận</option>
					<option value="Quận Tân Bình">Quận Tân Bình</option>
					<option value="Quận Tân Phú">Quận Tân Phú</option>
					<option value="Quận Thủ Đức">Quận Thủ Đức</option>
					<option value="Huyện Bình Chánh">Huyện Bình Chánh</option>
					<option value="Huyện Cần Giờ">Huyện Cần Giờ</option>
					<option value="Huyện Củ Chi">Huyện Củ Chi</option>
					<option value="Huyện Hóc Môn">Huyện Hóc Môn</option>
					<option value="Huyện Nhà Bè">Huyện Nhà Bè</option>
				</select>
			</div>
			<div class="search f_row">
				<input type="text" name="s" placeholder="Tìm kiếm">
			</div>
			<div class="loai_bds f_row">
				<select id="loai_bds" name="loai_bds_7">
					<option value="">Loại BĐS</option>
					<option value="Nhà đất">Nhà đất</option>
					<option value="Chung cư">Chung cư</option>
					<option value="Đất thổ cư">Đất thổ cư</option>
					<option value="Văn phòng">Văn phòng</option>
					<option value="Mặt bằng kd">Mặt bằng kd</option>
					<option value="Kho xưởng">Kho xưởng</option>
					<option value="BĐS khác">BĐS khác</option>
				</select>
			</div>
			<div id="dien_tich" class="f_row">
				<input type="text" value='Diện tích' disabled>
				<input type="hidden" name="dien_tich_8" class="dien_tich">
				<input type="number" class="dt_from" placeholder="Từ">
				<input type="number" class="dt_to" placeholder="đến">
				<span>m2</span>
			</div>
			<div class="khoang_gia f_row">
				<select id="khoang_gia" name="khoang_gia_9">
					<option value="">Khoảng Giá</option>
					<option value="Thỏa Thuận">Thỏa Thuận</option>
					<option value="Dưới 3 triệu">Dưới 3 triệu</option>
					<option value="3 – 5 triệu">3 – 5 triệu</option>
					<option value="5 – 10 triệu">5 – 10 triệu</option>
					<option value="10 – 15 triệu">10 – 15 triệu</option>
					<option value="15 – 20 triệu">15 – 20 triệu</option>
					<option value="20 – 30 triệu">20 – 30 triệu</option>
					<option value="30 – 40 triệu">30 – 40 triệu</option>
					<option value="40 – 60 triệu">40 – 60 triệu</option>
					<option value="60 – 80 triệu">60 – 80 triệu</option>
					<option value="80 – 100 triệu">80 – 100 triệu</option>
					<option value="100 – 300 triệu">100 – 300 triệu</option>
					<option value="300 – 500 triệu">300 – 500 triệu</option>
					<option value="500 – 700 triệu">500 – 700 triệu</option>
					<option value="700 – 1 tỷ">700 – 1 tỷ</option>
					<option value="1 – 2 tỷ">1 – 2 tỷ</option>
					<option value="2 – 3 tỷ">2 – 3 tỷ</option>
					<option value="3 – 4 tỷ">3 – 4 tỷ</option>
					<option value="4 – 6 tỷ">4 – 6 tỷ</option>
					<option value="6 – 8 tỷ">6 – 8 tỷ</option>
					<option value="8 – 10 tỷ">8 – 10 tỷ</option>
					<option value="10 – 20 tỷ">10 – 20 tỷ</option>
					<option value="20 – 40 tỷ">20 – 40 tỷ</option>
					<option value="40 – 60 tỷ">40 – 60 tỷ</option>
					<option value="Trên 60 tỷ">Trên 60 tỷ</option>
				</select>
			</div>
			<div class="tim_kiem f_row"><button type="submit">Tìm kiếm nhanh</button></div>
		</form>
		<?php
	}

	public function filter_widget() {
		ob_start();
		$this->content_shortcode_widget();
		return ob_get_clean();
	}

	public function content_shortcode_widget(){
		$loai_tin = isset($_GET['loai_tin_3']) ? $_GET['loai_tin_3'] : '';
		$thanh_pho = isset($_GET['thanh_pho_4']) ? $_GET['thanh_pho_4'] : '';
		$quan_huyen_hn = isset($_GET['quan_huyen_hn_5']) ? $_GET['quan_huyen_hn_5'] : '';
		$quan_huyen_hcm = isset($_GET['quan_huyen_hcm_6']) ? $_GET['quan_huyen_hcm_6'] : '';
		$loai_bds = isset($_GET['loai_bds_7']) ? $_GET['loai_bds_7'] : '';
		$dien_tich = isset($_GET['dien_tich_8']) ? $_GET['dien_tich_8'] : '';
		$khoang_gia = isset($_GET['khoang_gia_9']) ? $_GET['khoang_gia_9'] : '';
		?>
		<form class="filter_home filter_widget" method="get" action="<?php echo home_url( ).'/filter'; ?>">
			<div class="loai_tin f_row">
				<select class="loai_tin" name="loai_tin_3">
					<option value="">Loại tin</option>
					<option value="BĐS Bán">BĐS Bán</option>
					<option value="BĐS Cho Thuê">BĐS Cho Thuê</option>
				</select>
			</div>
			<div class="thanh_pho f_row">
				<select id="thanh_pho" name="thanh_pho_4">
					<option value="">Tỉnh/Thành phố</option>
					<option value="Hà Nội">Hà Nội</option>
					<option value="TPHCM">TPHCM</option>
				</select>
			</div>
			<div id="quan_huyen" class="f_row">
				<select class="quan_huyen">
					<option value="">Chọn quận</option>
				</select>
			</div>
			<div id="quan_huyen_hn" class="f_row">
				<select class="quan_huyen_hn" name="quan_huyen_hn_5">
					<option value="">Chọn quận Hà Nội</option>
					<option value="Quận Ba Đình">Quận Ba Đình</option>
					<option value="Quận Bắc Từ Liêm">Quận Bắc Từ Liêm</option>
					<option value="Quận Cầu Giấy">Quận Cầu Giấy</option>
					<option value="Quận Đống Đa">Quận Đống Đa</option>
					<option value="Quận Hai Bà Trưng">Quận Hai Bà Trưng</option>
					<option value="Quận Hoàn Kiếm">Quận Hoàn Kiếm</option>
					<option value="Quận Hà Đông">Quận Hà Đông</option>
					<option value="Quận Hoàng Mai">Quận Hoàng Mai</option>
					<option value="Quận Long Biên">Quận Long Biên</option>
					<option value="Quận Nam Từ Liêm">Quận Nam Từ Liêm</option>
					<option value="Quận Tây Hồ">Quận Tây Hồ</option>
					<option value="Quận Thanh Xuân">Quận Thanh Xuân</option>
					<option value="Huyện Ba Vì">Huyện Ba Vì</option>
					<option value="Huyện Chương Mỹ">Huyện Chương Mỹ</option>
					<option value="Huyện Đan Phượng">Huyện Đan Phượng</option>
					<option value="Huyện Đông Anh">Huyện Đông Anh</option>
					<option value="Huyện Gia Lâm">Huyện Gia Lâm</option>
					<option value="Huyện Hoài Đức">Huyện Hoài Đức</option>
					<option value="Huyện Mê Linh">Huyện Mê Linh</option>
					<option value="Huyện Mỹ Đức">Huyện Mỹ Đức</option>
					<option value="Huyện Phúc Thọ">Huyện Phúc Thọ</option>
					<option value="Huyện Phú Xuyên">Huyện Phú Xuyên</option>
					<option value="Huyện Quốc Oai">Huyện Quốc Oai</option>
					<option value="Huyện Sóc Sơn">Huyện Sóc Sơn</option>
					<option value="Huyện Thạch Thất">Huyện Thạch Thất</option>
					<option value="Huyện Thanh Oai">Huyện Thanh Oai</option>
					<option value="Huyện Thanh Trì">Huyện Thanh Trì</option>
					<option value="Huyện Thường Tín">Huyện Thường Tín</option>
					<option value="Huyện Ứng Hòa">Huyện Ứng Hòa</option>
					<option value="Thị Xã Sơn Tây">Thị Xã Sơn Tây</option>
				</select>
			</div>
			<div id="quan_huyen_hcm" class="f_row">
				<select class="quan_huyen_hcm" name="quan_huyen_hcm_6">
					<option value="">Chọn quận HCM</option>
					<option value="Quận 1">Quận 1</option>
					<option value="Quận 2">Quận 2</option>
					<option value="Quận 3">Quận 3</option>
					<option value="Quận 4">Quận 4</option>
					<option value="Quận 5">Quận 5</option>
					<option value="Quận 6">Quận 6</option>
					<option value="Quận 7">Quận 7</option>
					<option value="Quận 8">Quận 8</option>
					<option value="Quận 9">Quận 9</option>
					<option value="Quận 10">Quận 10</option>
					<option value="Quận 11">Quận 11</option>
					<option value="Quận 12">Quận 12</option>
					<option value="Quận Bình Tân">Quận Bình Tân</option>
					<option value="Quận Gò Vấp">Quận Gò Vấp</option>
					<option value="Quận Phú Nhuận">Quận Phú Nhuận</option>
					<option value="Quận Tân Bình">Quận Tân Bình</option>
					<option value="Quận Tân Phú">Quận Tân Phú</option>
					<option value="Quận Thủ Đức">Quận Thủ Đức</option>
					<option value="Huyện Bình Chánh">Huyện Bình Chánh</option>
					<option value="Huyện Cần Giờ">Huyện Cần Giờ</option>
					<option value="Huyện Củ Chi">Huyện Củ Chi</option>
					<option value="Huyện Hóc Môn">Huyện Hóc Môn</option>
					<option value="Huyện Nhà Bè">Huyện Nhà Bè</option>
				</select>
			</div>
			<div class="search f_row">
				<input type="text" name="s" placeholder="Tìm kiếm">
			</div>
			<div class="loai_bds f_row">
				<select id="loai_bds" name="loai_bds_7">
					<option value="">Loại BĐS</option>
					<option value="Nhà đất">Nhà đất</option>
					<option value="Chung cư">Chung cư</option>
					<option value="Đất thổ cư">Đất thổ cư</option>
					<option value="Văn phòng">Văn phòng</option>
					<option value="Mặt bằng kd">Mặt bằng kd</option>
					<option value="Kho xưởng">Kho xưởng</option>
					<option value="BĐS khác">BĐS khác</option>
				</select>
			</div>
			<div id="dien_tich" class="f_row">
				<input type="text" value='Diện tích' disabled>
				<input type="hidden" name="dien_tich_8" class="dien_tich">
				<input type="number" class="dt_from" placeholder="Từ">
				<input type="number" class="dt_to" placeholder="đến">
				<span>m2</span>
			</div>
			<div class="khoang_gia f_row">
				<select id="khoang_gia" name="khoang_gia_9">
					<option value="">Khoảng Giá</option>
					<option value="Thỏa Thuận">Thỏa Thuận</option>
					<option value="Dưới 3 triệu">Dưới 3 triệu</option>
					<option value="3 – 5 triệu">3 – 5 triệu</option>
					<option value="5 – 10 triệu">5 – 10 triệu</option>
					<option value="10 – 15 triệu">10 – 15 triệu</option>
					<option value="15 – 20 triệu">15 – 20 triệu</option>
					<option value="20 – 30 triệu">20 – 30 triệu</option>
					<option value="30 – 40 triệu">30 – 40 triệu</option>
					<option value="40 – 60 triệu">40 – 60 triệu</option>
					<option value="60 – 80 triệu">60 – 80 triệu</option>
					<option value="80 – 100 triệu">80 – 100 triệu</option>
					<option value="100 – 300 triệu">100 – 300 triệu</option>
					<option value="300 – 500 triệu">300 – 500 triệu</option>
					<option value="500 – 700 triệu">500 – 700 triệu</option>
					<option value="700 – 1 tỷ">700 – 1 tỷ</option>
					<option value="1 – 2 tỷ">1 – 2 tỷ</option>
					<option value="2 – 3 tỷ">2 – 3 tỷ</option>
					<option value="3 – 4 tỷ">3 – 4 tỷ</option>
					<option value="4 – 6 tỷ">4 – 6 tỷ</option>
					<option value="6 – 8 tỷ">6 – 8 tỷ</option>
					<option value="8 – 10 tỷ">8 – 10 tỷ</option>
					<option value="10 – 20 tỷ">10 – 20 tỷ</option>
					<option value="20 – 40 tỷ">20 – 40 tỷ</option>
					<option value="40 – 60 tỷ">40 – 60 tỷ</option>
					<option value="Trên 60 tỷ">Trên 60 tỷ</option>
				</select>
			</div>
			<div class="tim_kiem f_row"><button type="submit">Tìm kiếm nhanh</button></div>
		</form>
		<?php
	}
}