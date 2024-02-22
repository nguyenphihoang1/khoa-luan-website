<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TinTucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tin_tucs')->delete();

        DB::table('tin_tucs')->truncate();

        DB::table('tin_tucs')->insert([

            [
                'tieu_de'               => 'NGÀY TỐT - GIÁ HỜI' ,
                'slug_bai_viet'         => Str::slug('NGÀY TỐT - GIÁ HỜI') ,
                'hinh_anh'              => 'https://media-fmplus.cdn.vccloud.vn/uploads/news/f4f9666d-a08a-4327-b934-1e4347ab0ba3.png',
                'mo_ta_ngan'            =>  'Từ ngày 13/03/2023, FM Style bán đồng giá từ 79k và sale off 15% TẤT CẢ SẢN PHẨM tại website.',
                'mo_ta_chi_tiet'        =>  'Đồng giá từ 79k
                                            - Đồng giá từ 79k các sản phẩm thời trang Nam - Nữ như: áo thun, quần short, quần dài, chân váy...
                                            Sale Off 15%
                                            Sale off 15% tất cả 500 sản phẩm Nam - Nữ - Phụ kiện tại website.
                                            Tất cả ưu đãi áp dụng đến hết ngày 31/03/2023, duy nhất khi đặt hàng tại website.
                                            Mời khách yêu trải nghiệm mua sắm tại nhà cùng FM tại Danh sách sản phẩm siêu sale ',
                'loai_bai_viet'         =>  1,
                'trang_thai'            =>  1,

            ],

            [
                'tieu_de'               => 'TẶNG VOUCHER 100K CHO TẤT CẢ KHÁCH HÀNG' ,
                'slug_bai_viet'         => Str::slug('TẶNG VOUCHER 100K CHO TẤT CẢ KHÁCH HÀNG') ,
                'hinh_anh'              => 'https://media-fmplus.cdn.vccloud.vn/uploads/news/47210329-f07a-483b-af0e-e877609630ed.png',
                'mo_ta_ngan'            =>  'Nhân dịp đầu Xuân Quý Mão 2023, Hệ thống thời trang gửi tặng tất cả khách hàng voucher 100k',
                'mo_ta_chi_tiet'        =>  'Tặng voucher 100k cho tất cả khách hàng
                                            Nhân dịp đầu Xuân Quý Mão 2023, Hệ thống thời trang FM gửi tặng tất cả khách hàng voucher 100k
                                            Chương trình áp dụng từ ngày 04/02 - 28/02/2023
                                            Điều kiện áp dụng: Với hóa đơn hàng Nam nguyên giá từ 300k trở lên.
                                            Hạn sử dụng voucher 15 ngày sau khi phát sinh hóa đơn.',
                'loai_bai_viet'         =>  1,
                'trang_thai'            =>  1,

            ],
            [
                'tieu_de'               => 'Happy Womens Day - Mua Sắm Nửa Giá Chỉ Từ 83K' ,
                'slug_bai_viet'         => Str::slug('Happy Womens Day - Mua Sắm Nửa Giá Chỉ Từ 83K') ,
                'hinh_anh'              => 'https://media-fmplus.cdn.vccloud.vn/uploads/news/56bc74f9-d54e-4b32-9e0d-4bb9ad4b56f5.png',
                'mo_ta_ngan'            =>  'Happy Womens Day, Từ ngày 04/03/2023, FM sale đồng giá chỉ từ 83k hàng loạt sản phẩm thời trang hot trend 2023.',
                'mo_ta_chi_tiet'        =>  'Ngoài ra, sale off 15% tất cả sản phẩm trên website và freeship cho đơn hàng từ 500k.
                                            Chương trình áp dụng duy nhất tại website chính thức của FM đến hết ngày 10/03/2023.
                                            Mời bạn nhanh tay mua sắm hàng thời trang Nam - Nữ với giá chỉ còn 1 nửa.
                                            Lưu ý: Không áp dụng đồng thời với các ưu đãi/ khuyến mãi khác đang diễn ra.',
                'loai_bai_viet'         =>  1,
                'trang_thai'            =>  1,

            ],
            [
                'tieu_de'               => 'MỪNG HỆ THỐNG KHAI TRƯƠNG 2 CHI NHÁNH MỚI' ,
                'slug_bai_viet'         => Str::slug('MỪNG HỆ THỐNG KHAI TRƯƠNG 2 CHI NHÁNH MỚI') ,
                'hinh_anh'              => 'https://media-fmplus.cdn.vccloud.vn/uploads/news/a3cb497f-8db7-464d-8a05-54f58faa8a01.png',
                'mo_ta_ngan'            =>  'Từ ngày 02 - 05/03/2023, Hệ thống thời trang TẶNG QUÀ MIỄN PHÍ và BÁN ĐỒNG GIÁ TỪ 16K.',
                'mo_ta_chi_tiet'        =>  'Mừng khai trương 2 chi nhánh: Grand Opening 274 Cách Mạng Tháng 8, Quận 3, TP Hồ Chí Minh và Re Opening 26 Âu Cơ, Liên Chiểu, TP Đà Nẵng, FM diễn ra hàng loạt chương trình cực hấp dẫn:
                                            Tặng hơn 7.000 phần quà miễn phí; Khung giờ vàng đồng giá từ 16K - không điều kiện và đồng giá từ 16k các khung giờ còn lại trong ngày.',
                'loai_bai_viet'         =>  1,
                'trang_thai'            =>  1,

            ],
            [
                'tieu_de'               => 'MINI GAME “CHECKIN NGAY - QUÀ LIỀN TAY” - NHẬN NGAY CHUYẾN DU LỊCH THÁI LAN CHO 02 NGƯỜI' ,
                'slug_bai_viet'         => Str::slug('MINI GAME “CHECKIN NGAY - QUÀ LIỀN TAY” - NHẬN NGAY CHUYẾN DU LỊCH THÁI LAN CHO 02 NGƯỜI') ,
                'hinh_anh'              => 'https://media-fmplus.cdn.vccloud.vn/uploads/news/2c387462-9e17-48b5-b196-38c3c434464e.jpg',
                'mo_ta_ngan'            =>  'Từ ngày 5/02 - 14/02/2023, khi mua sắm, bạn sẽ có cơ hội nhận ngay 1 chuyến du lịch Thái Lan dành cho 02 người + 2 sản phẩm trong BST Valentine 2023 của FM Style và 7 giải thưởng khác, mỗi giải trị giá 1.000.000 đồng.',
                'mo_ta_chi_tiet'        =>  'Từ ngày 6/02 - 14/02/2023, khi đi 02 người và phát sinh hóa đơn >= 499k tại tất cả chi nhánh của FM Style. Bạn sẽ được tham gia chương trình mini game “CHECKIN NGAY - QUÀ LIỀN TAY” với các bước như sau.

                Bước 1: Khi khách hàng đi 2 người (nam-nam, nữ-nữ, nam-nữ) phát sinh hóa đơn lớn hơn hoặc bằng #499K (có thể bao gồm hàng sale) tại bất kì chi nhánh FM Style nào trên toàn quốc sẽ có cơ hội tham gia chương trình.

                Bước 2: Quý khách chụp hình đôi tại khu vực check-in Valentine’s và đăng trên trang cá nhân ở chế độ công khai kèm mục #check-in tại cửa hàng mà mình đang mua sắm. Số lượng hình tối thiểu là 01 tấm và không giới hạn tối đa hình đăng lên. Phần hashtag đính kèm: #FMStyle #ValentinewithFM #LetsgoThailandtogether',
                'loai_bai_viet'         =>  1,
                'trang_thai'            =>  1,

            ],
            [
                'tieu_de'               => 'Cách chọn chân váy chữ A phù hợp với từng vóc dáng' ,
                'slug_bai_viet'         => Str::slug('Cách chọn chân váy chữ A phù hợp với từng vóc dáng') ,
                'hinh_anh'              => 'https://media-fmplus.cdn.vccloud.vn/uploads/news/74994931-add2-442b-88c5-21cd86736bf2.png',
                'mo_ta_ngan'            =>  'Để chọn được chân váy chữ A đẹp, trước tiên bạn phải xác định được mình thuộc dáng người nào. Với những bí quyết chọn chân váy dưới đây bạn sẽ luôn là quý cô xinh đẹp.',
                'mo_ta_chi_tiet'        =>  'Chúng ta thường phân biệt dáng người của mình trong 3 kiểu là: người ốm, người mập và cân đối. Tuy nhiên đó chỉ mới là cách phân biệt dáng tổng thể, nên nếu chọn chân váy theo cách phân biệt này thì vẫn chưa thể khoe trọn ưu điểm. Vì vậy nàng hãy dựa theo từng đặc điểm 3 vòng cơ thể để xác định mình thuộc loại nào trong 4 dáng người sau cơ bản thường gặp sau, từ đó biết cách chọn kiểu chân váy tôn dáng: dáng quả lê, dáng quả táo, dáng đồng hồ cát, dáng người chữ nhật.',
                'loai_bai_viet'         =>  2,
                'trang_thai'            =>  1,

            ],
            [
                'tieu_de'               => 'Mê mẩn với những mẫu váy công chúa dự tiệc sang trọng' ,
                'slug_bai_viet'         => Str::slug('Mê mẩn với những mẫu váy công chúa dự tiệc sang trọng') ,
                'hinh_anh'              => 'https://media-fmplus.cdn.vccloud.vn/uploads/news/f5b0e70f-cfe0-4781-9bd2-2cfbb38e634f.png',
                'mo_ta_ngan'            =>  'Ngày nay, váy công chúa dự tiệc là thiết kế không thể thiếu với cô nàng hiện đại. Khám phá 5 mẫu váy sang trọng cho quý cô dưới đây, chắc chắn sẽ khiến bạn mê mẩn.',
                'mo_ta_chi_tiet'        =>  'Với lối thiết kế tối giản nhưng vô cùng thời thượng, váy công chúa dự tiệc luôn được các cô nàng hiện đại “sủng ái”. Tìm hiểu về lịch sử hình thành và phát triển của váy dự tiệc để hiểu thêm về nguồn gốc thú vị của những thiết kế độc đáo này.
                                            Sự phát triển của váy dự tiệc qua từng giai đoạn
                                            Từ xa xưa khi vừa được khai sinh, váy dự tiệc chỉ xuất hiện ở các bữa tiệc hoàng gia, dành cho giới thượng lưu, quý tộc. Ở giai đoạn này, váy dự tiệc được thiết kế rườm rà, xòe rộng, phần chít eo cao, ôm bó sát vào cơ thể và tay ngắn phồng to. Do khá nặng và cồng kềnh nên khiến người mặc khó chịu. Váy dự tiệc lúc này là biểu tượng của giới thượng lưu, với sự lộng lẫy và hoành tráng mà những chiếc váy này mang lại, nên chỉ những người có địa vị trong xã hội và giàu có mới được sở hữu món đồ xa xỉ này.',
                'loai_bai_viet'         =>  2,
                'trang_thai'            =>  1,

            ],
            [
                'tieu_de'               => '5 sai lầm phối đồ với áo polo nam 99% nam giới đang mắc phải' ,
                'slug_bai_viet'         => Str::slug('5 sai lầm phối đồ với áo polo nam 99% nam giới đang mắc phải') ,
                'hinh_anh'              => 'https://media-fmplus.cdn.vccloud.vn/uploads/news/a1391d83-0dc0-4085-af9f-20a226506f26.png',
                'mo_ta_ngan'            =>  'Sở hữu khá nhiều áo polo nhưng bạn có biết những quy tắc phối đồ với áo polo nam? Nằm lòng những quy tắc dưới đây sẽ giúp bạn trở thành người đàn ông tinh tế.',
                'mo_ta_chi_tiet'        =>  'Áo polo luôn là món đồ “có chổ đứng” trong tủ đồ tất cả phái mạnh. Nhưng chỉ cần một sai lầm nhỏ khi phối đồ với áo polo nam cũng khiến bạn trở nên kém sang. Nằm lòng những quy tắc phối đồ với áo polo nam đơn giản dưới đây mà FM chia sẻ sẽ giúp bạn trở thành người đàn ông tinh tế và có gu.
                                            Tại sao áo polo nam trở thành món đồ được phái mạnh “sủng ái” ?
                                            Là trang phục “nhẵn mặt” của làng mốt hơn 100 năm qua, áo polo (hay còn gọi là áo thun cổ bẻ) đã trở thành món đồ thiết yếu của phái mạnh.
                                            Đáp ứng tất cả tiêu chí: thanh lịch, trẻ trung, giúp người mặc thoải mái nhưng không quá trang trọng như sơ mi, và hơn hết là phù hợp với mọi hoàn cảnh.',
                'loai_bai_viet'         =>  2,
                'trang_thai'            =>  1,

            ],
            [
                'tieu_de'               => 'Gợi ý 5 mẫu váy đầm làm quà tặng ngày 8/3 chắc chắn hài lòng phái đẹp' ,
                'slug_bai_viet'         => Str::slug('Gợi ý 5 mẫu váy đầm làm quà tặng ngày 8/3 chắc chắn hài lòng phái đẹp') ,
                'hinh_anh'              => 'https://media-fmplus.cdn.vccloud.vn/uploads/news/e31fbcb7-f2bf-4f9a-a4be-7455f1b6f569.png',
                'mo_ta_ngan'            =>  'Chọn quà tặng dịp 8/3 sao cho người ấy hài lòng là vấn đề “nan giải” với cánh mày râu. Nhưng năm nay bạn đừng lo, với những gợi ý các mẫu váy đầm mới nhất của FM dưới đây, chắc chắn sẽ khiến “người ấy” của bạn hài lòng',
                'mo_ta_chi_tiet'        =>  'Lấy cảm hứng từ ngày Liên Hiệp Quốc vì nữ quyền và hòa bình Quốc Tế trọng đại, FM ra mắt BST Ladies & Beauty như món quà để mọi người thể hiện tình yêu thương và trân trọng dành cho người phụ nữ đời mình. Họ - là những người đã có 365 ngày làm vợ, làm mẹ hoặc cả làm bạn với chúng ta. Thế nên, ngày nào cũng là ngày mà người phụ nữ xứng đáng có được yêu thương, hạnh phúc. Với những thiết kế mới mẻ và tràn đầy nhựa sống được gói gọn trong BST Ladies & Beauty dưới đây, chắc chắn sẽ khiến nửa kia của bạn vui lòng.',
                'loai_bai_viet'         =>  2,
                'trang_thai'            =>  1,

            ],
            [
                'tieu_de'               => 'Gợi ý chọn đồ đôi trong ngày Valentine' ,
                'slug_bai_viet'         => Str::slug('Gợi ý chọn đồ đôi trong ngày Valentine') ,
                'hinh_anh'              => 'https://media-fmplus.cdn.vccloud.vn/uploads/news/96f69a50-d9c2-451e-955b-640d77eafe6e.png',
                'mo_ta_ngan'            =>  'Mặc đồ đôi dường như đang trở thành xu hướng “khẳng định chủ quyền” của các cặp đôi mỗi độ Valentine về. Không chỉ gắn kết tình cảm diện đồ đôi còn giúp lưu giữ lại những khoảnh khắc thăng hoa đẹp đẽ nhất của tình yêu',
                'mo_ta_chi_tiet'        =>  'Bài viết hôm nay, FM Style sẽ gợi ý cho bạn tips chọn đồ đôi tặng nửa kia cực ý nghĩa. Dành ít thời gian tham khảo để có một mùa Valentine thật đáng nhớ nhé!
                                            Gợi ý chọn đồ đôi tặng người yêu ý nghĩa dịp Valentine
                                            Từ lâu, Valentine được xem như là “cơ hội” đặc biệt cho các cặp đôi bày tỏ lòng mình. Việc tặng quà, tặng những món đồ đôi cho nhau vào dịp này mang nhiều ý nghĩa đặc biệt. Món quà như thay lời “đường mật” gửi gắm đến nửa kia của mình.
                                            Nếu bạn đang “crush” một ai đó thì món quà Valentine như một cách lời tỏ tình nhẹ nhàng, tinh tế. Nếu may mắn hơn trong một mối quan hệ yêu đương thì món quà là thứ giúp “hâm nóng” cảm xúc cả hai. Bạn và người ấy đã chia tay, việc tặng đồ đôi Valentine rất có thể sẽ giúp hàn gắn tình xưa nếu cả hai vẫn còn rung động. ',
                'loai_bai_viet'         =>  2,
                'trang_thai'            =>  1,

            ],
            [
                'tieu_de'               => '5 sai lầm khi diện chân váy ngắn khiến nàng kém sang' ,
                'slug_bai_viet'         => Str::slug('5 sai lầm khi diện chân váy ngắn khiến nàng kém sang') ,
                'hinh_anh'              => 'https://media-fmplus.cdn.vccloud.vn/uploads/news/64b0ad5a-d4e9-422b-8bec-70865c0dc127.png',
                'mo_ta_ngan'            =>  'Nhờ khả năng tạo cảm giác đôi chân thon dài, chân váy ngắn trở thành item quốc dân khiến cô nàng nào cũng mê mẫn. Tuy nhiên nếu vô tình mắc phải những lỗi mix đồ dưới đây sẽ khiến nàng trở nên kém sang.',
                'mo_ta_chi_tiet'        =>  'Một trong những sai lầm nghiêm trọng khi phối đồ với chân váy ngắn các nàng thường gặp phải, khiến mình trở thành nấm lùn là mix đồ sai tỷ lệ. Một chiếc chân váy ngắn mix cùng chiếc áo form rộng thùng thình và không sơ vin chính là thảm hoạ.
                                            Để khắc phục sai lầm này, nàng nên nắm cách phối đồ theo tỷ lệ ⅓ và ⅔. Đây được coi là tỷ lệ vàng trong nghệ thuật, thường được các hoạ sĩ, nhiếp ảnh gia áp dụng.
                                            Áp dụng quy tắc này khi mix đồ sẽ giúp những cô nàng có chiều cao khiêm tốn, hoặc độ dài của chân và lưng không hài hoà sẽ lấy lại được sự cân bằng của tỷ lệ cơ thể.',
                'loai_bai_viet'         =>  3,
                'trang_thai'            =>  1,

            ],
            [
                'tieu_de'               => 'Theo dõi những TikToker dưới đây để có gu thời trang siêu đỉnh' ,
                'slug_bai_viet'         => Str::slug('Theo dõi những TikToker dưới đây để có gu thời trang siêu đỉnh') ,
                'hinh_anh'              => 'https://media-fmplus.cdn.vccloud.vn/uploads/news/7a7fc1f0-f712-41fd-9219-37633043d94d.jpg',
                'mo_ta_ngan'            =>  'Không chỉ là nơi để giải trí, Tik Tok còn cung cấp nhiều kiến thức về thời trang, giúp gu thời trang của bạn trở nên sành điệu hơn nếu bạn theo dõi những hot TikToker nổi tiếng với gu ăn mặc siêu đỉnh dưới đây.',
                'mo_ta_chi_tiet'        =>  'Tik Tok là nền tảng video âm nhạc và mạng xã hội của Trung Quốc, ra mắt từ năm 2017 đến nay có hơn 1 tỷ người dùng. Đây là nơi để người dùng chia sẻ thông tin dưới dạng video ngắn dưới 1 phút với nhạc, bộ lọc và những tính năng khác. Từ khi ra đời đến nay, ứng dụng này nhanh chóng phát triển vượt bậc và thu hút số lượng người dùng tăng chóng mặt. Tik Tok là ứng dụng được tải xuống nhiều nhất năm 2021 với 656 triệu lượt tải, vượt qua Facebook về lượt tải và lượt tìm kiếm trên Google.
                                             Với sự phát triển chóng mặt của mạng xã hội Tik Tok, việc trở thành TikToker nổi tiếng là mong muốn của rất nhiều người bởi đây là công việc giúp hái ra tiền. Một trong những nội dung kênh được nhiều người xây dựng là chia sẻ về lĩnh vực thời trang, trong đó có những top TikToker Việt Nam nổi tiếng như: ',
                'loai_bai_viet'         =>  3,
                'trang_thai'            =>  1,

            ],
            [
                'tieu_de'               => 'Khởi nghiệp thời trang: Bài toán marketing thúc đẩy doanh số' ,
                'slug_bai_viet'         => Str::slug('Khởi nghiệp thời trang: Bài toán marketing thúc đẩy doanh số') ,
                'hinh_anh'              => 'https://media-fmplus.cdn.vccloud.vn/uploads/news/47704a9f-081e-4e01-bd79-6351fd31b5fb.png',
                'mo_ta_ngan'            =>  'Để khởi nghiệp thời trang thành công, đam mê, am hiểu thời trang là chưa đủ. Bạn cũng nên trang bị cho mình một chiến lược marketing phù hợp với thời đại để chiếm được ưu thế kinh doanh.',
                'mo_ta_chi_tiet'        =>  'Xây dựng một kế hoạch marketing rõ ràng là điều rất cần thiết cho những startup “chập chững” bước chân vào con đường kinh doanh thời trang. Thông qua kế hoạch marketing, bạn có thể quản lý được công việc kinh doanh của mình từ khách hàng, đối thủ cạnh tranh đến các hoạt động quảng cáo để chủ động thay đổi phù hợp với từng giai đoạn phát triển của công ty.',
                'loai_bai_viet'         =>  3,
                'trang_thai'            =>  1,

            ],
            [
                'tieu_de'               => 'Bỏ túi những món đồ mang đi phượt chuẩn phượt thủ' ,
                'slug_bai_viet'         => Str::slug('Bỏ túi những món đồ mang đi phượt chuẩn phượt thủ') ,
                'hinh_anh'              => 'https://media-fmplus.cdn.vccloud.vn/uploads/news/4024b751-6fd5-42ae-9730-b664595d67f3.jpg',
                'mo_ta_ngan'            =>  'Du lịch bụi đang là xu hướng thịnh hành hiện nay nhưng không phải ai cũng có kinh nghiệm đi phượt an toàn. Những đồ mang đi phượt sau đây giúp đảm bảo sự an toàn của bạn trên mọi cung đường.',
                'mo_ta_chi_tiet'        =>  'Trang phục đi phượt dành cho nam
                                            Quần lính, quần kaki bụi bặm chuẩn dân phượt
                                            Nếu bạn là một người ưa chuộng phong cách bụi bặm, bạn ưa thích những bản phối đơn giản, không màu mè sặc sỡ nhưng vẫn toát lên sự khỏe khoắn và mạnh mẽ. Thì một chiếc quần lính hoặc quần kaki sẽ là sự lựa chọn số một.
                                            Outfit quần lính, quần kaki kết hợp cùng một chiếc áo thun mỏng nhẹ là sự lựa chọn hoàn hảo cho mọi chuyến đi. Đơn giản, thoải mái khả năng chịu mài mòn tốt. Vì thế đây là phong cách hàng đầu của dân phượt thủ.',
                'loai_bai_viet'         =>  3,
                'trang_thai'            =>  1,

            ],
            [
                'tieu_de'               => 'Học Mẫn Tiên cách phối đồ bánh bèo “diện đâu chuẩn đấy”' ,
                'slug_bai_viet'         => Str::slug('Học Mẫn Tiên cách phối đồ bánh bèo “diện đâu chuẩn đấy”') ,
                'hinh_anh'              => 'https://media-fmplus.cdn.vccloud.vn/uploads/news/c586378f-700e-44a5-88c7-2fe9368a4685.png',
                'mo_ta_ngan'            =>  'Mẫn Tiên từ lâu đã được yêu mến với vẻ đẹp “trong vắt như sương”. Dù không hoạt động sôi nổi trong showbiz song cuộc sống thường Nhật và những tips làm đẹp hay phối đồ của cô nàng cũng rất được quan tâm.',
                'mo_ta_chi_tiet'        =>  'Không sở hữu chiều cao lý tưởng hay thân hình nóng bỏng nhưng nàng hotgirl của “bộ ba sát thủ” vẫn được giới trẻ xem như một fashionista chính hiệu. Phong cách dịu dàng, nữ tính cực kỳ phù hợp với vóc dáng hạt tiêu chưa đến 1m50 của Mẫn Tiên. Dưới đây là những cách mix match “chuẩn nàng thơ” khiến dân tình mê mẩn, Đặc biệt là các cô gái có chiều cao khiêm tốn nhất định phải nằm lòng cách phối này, đảm bảo tuy không cao nhưng ai cũng phải ngước nhìn đấy ạ',
                'loai_bai_viet'         =>  3,
                'trang_thai'            =>  1,

            ],

        ]);
    }
}
