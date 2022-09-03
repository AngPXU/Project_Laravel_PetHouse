@extends('layout')
@section('content')

<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>{{$meta_title}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="service">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="service-item tablinks" onclick="openCity(event, 'bm')" id="defaultOpen">
                    <div class="service-icon"><i class="fas fa-lock"></i></div>
                    <h3>Chính sách bảo mật thông tin</h3>
                    <p>Chúng tôi cam kết bảo mật và tôn trọng tất cả thông tin cá nhân của khách hàng khi tham gia với chúng tôi.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item tablinks" onclick="openCity(event, 'dt')">
                    <div class="service-icon"><i class="fas fa-undo"></i></div>
                    <h3>Chính sách đổi trả</h3>
                    <p>Khách hàng sẽ được đổi trong vòng 7 ngày kể từ ngày nhận hàng và chỉ được đổi 1 lần duy nhất.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item tablinks" onclick="openCity(event, 'bh')">
                    <div class="service-icon"><i class="fas fa-box"></i></div>
                    <h3>Chính sách bảo hành</h3>
                    <p>Có đầy đủ phiếu bảo hành (đối với thú cưng) và tem bảo hành (đối với phụ kiện) và đúng thời gian yêu câu.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item tablinks" onclick="openCity(event, 'gh')">
                    <div class="service-icon"><i class="fas fa-truck"></i></div>
                    <h3>Chính sách giao hàng</h3>
                    <p>Hỗ trợ vận chuyển sản phẩm đến được tay khách hàng trên khắp 63 tỉnh thành trên toàn quốc.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item tablinks" onclick="openCity(event, 'tt')">
                    <div class="service-icon"><i class="fas fa-credit-card"></i></div>
                    <h3>Chính sách thanh toán</h3>
                    <p>Chấp nhận thanh toán qua 3 hình thức: Thanh toán tiền mặt, Thanh toán COD, Thanh toán qua thẻ ngân hàng</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item tablinks" onclick="openCity(event, 'tg')">
                    <div class="service-icon"><i class="fas fa-money-bill"></i></div>
                    <h3>Chính sách trả góp 0%</h3>
                    <p>Áp dụng hình thức mua thú cưng trả góp 0% lãi suất bằng thẻ tín dụng và trả dần trong vòng từ 3-12 tháng</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'bm')" id="defaultOpen">Chính sách bảo mật</button>
                    <button class="tablinks" onclick="openCity(event, 'dt')">Chính sách đổi trả</button>
                    <button class="tablinks" onclick="openCity(event, 'bh')">Chính sách bảo hành</button>
                    <button class="tablinks" onclick="openCity(event, 'gh')">Chính sách giao hàng</button>
                    <button class="tablinks" onclick="openCity(event, 'tt')">Chính sách thanh toán</button>
                    <button class="tablinks" onclick="openCity(event, 'tg')">Chính sách trả góp</button>
                    <button class="tablinks" onclick="openCity(event, 'mh')">Hướng dẫn mua hàng</button>
                </div>
                  
                <div id="bm" class="tabcontent">
                    <h3>Chính sách bảo mật thông tin</h3>
                    <p>Hiểu được mối quan tâm của khách hàng đến việc PetHouse sẽ sử dụng và quản lý thông tin cá nhân như thế nào, chúng tôi đã thiết lập nên “Chính sách bảo mật thông tin”. Chúng tôi cam kết bảo mật và tôn trọng tất cả thông tin cá nhân của khách hàng.</p>
                    <p>Để hiểu rõ hơn về “Chính sách bảo mật thông tin”, khách hàng vui lòng xem chi tiết tại các mục bên dưới. Bằng việc truy cập, để lại thông tin đặt hàng trên https://adpethouse.com, bạn đã đồng ý và chấp nhận với các phương pháp, yêu cầu, và/hoặc ràng buộc bởi các điều khoản, quy định bảo mật của PetHouse.</p>
                    <h5>Khi nào PetHouse sẽ thu thập thông tin cá nhân?</h5>
                    <p>PetHouse chỉ thu thập thông tin khách hàng trong trường hợp:</p>
                    <ul>
                        <li>Khách hàng đồng ý mua sản phẩm.</li>
                        <li>Khách hàng đặt cọc trước sản phẩm.</li>
                    </ul>
                    <h5>PetHouse sẽ thu thập những thông tin nào?</h5>
                    <p>PetHouse chỉ yêu cầu các thông tin sau:</p>
                    <ul>
                        <li>Họ tên khách hàng.</li>
                        <li>Số điện thoại.</li>
                        <li>Email.</li>
                        <li>Địa chỉ (Dùng để giao hàng).</li>
                    </ul>
                    <h5>Mục đích và phạm vi thu thập thông tin</h5>
                    <p>PetHouse cam kết mục đích thu thập những thông tin trên đều chủ yếu phục vụ cho việc chăm sóc khách hàng trước và sau khi mua. Cụ thể, đối với những thông tin khách hàng tự nguyện cung cấp, chúng tôi cam kết chỉ sử dụng trong các phạm vi sau:</p>
                    <ul>
                        <li>Xử lý quy trình giao hàng: Bao gồm từ bước đầu xác nhận đơn đặt hàng đến khi đơn hàng được giao thành công.</li>
                        <li>Cung cấp cho các bên đối tác vận chuyển theo đúng quy định của việc vận chuyển hàng hóa.</li>
                        <li>Hỗ trợ, cung cấp thông tin chăm sóc thú cưng (thời gian thăm khám, tiêm vaccine cho thú cưng định kỳ), thông báo chương trình khuyến mãi, gửi thư cảm ơn & tri ân,..</li>
                    </ul>
                    <p>Tất cả đều nhằm đến mục đích chăm sóc khách hàng, mang đến cho khách hàng những trải nghiệm tốt nhất, giúp gia tăng sự gắn bó giữa khách hàng và PetHouse.</p>
                    <p>Chúng tôi cam kết không sử dụng thông tin khách hàng cho những mục đích thương mại, mua bán thông tin.</p>
                </div>
                  
                <div id="dt" class="tabcontent">
                    <h3>Chính sách đổi trả</h3>
                    <p>PetHouse khuyến khích khách hàng nên kiểm tra sản phẩm (thú cưng, phụ kiện) trước khi tiến hành thanh toán để tránh trường hợp sản phẩm giao không đúng với yêu cầu..</p>
                    <h5>Chính sách đổi trả đối với loại hình sản phẩm:</h5>
                    <p>Đối với phụ kiện:</p>
                    <ul>
                        <li>Khách hàng sẽ được đổi trong vòng 7 ngày kể từ ngày nhận hàng và chỉ được đổi 1 lần duy nhất. Không áp dụng đối với các sản phẩm mua trong thời gian khuyến mãi.</li>
                        <li>Phụ kiện khi đổi phải là sản phẩm chưa qua sử dụng, còn nguyên seal – tem – nhãn – mác, không bị dơ bẩn.</li>
                        <li>Phụ kiện mới phải có giá tương đương hoặc cao hơn sản phẩm cũ. Khách hàng sẽ không được hoàn lại tiền thừa trong trường hợp sản phẩm mới có giá thấp hơn sản phẩm cũ.</li>
                    </ul>
                    <p>Đối với thú cưng: PetHouse không áp dụng chính sách trả. Chúng tôi sẽ áp dụng chính sách đổi dựa trên gói bảo hành khách hàng đã chọn lúc ban đầu.</p>
                    <h5>Chính sách đổi trả đối với hình thức mua sắm:</h5>
                    <ul>
                        <li>Đối với khách hàng mua online: Khách hàng vui lòng liên hệ với bộ phận chăm sóc khách hàng để được hỗ trợ đổi trả trong vòng 7 ngày kể từ ngày nhận sản phẩm bằng cách inbox fanpage hoặc gọi hotline. Khách hàng vui lòng chịu phí vận chuyển.</li>
                        <li>Đối với khách hàng mua trực tiếp: Sản phẩm sẽ được thực hiện đổi trả trực tiếp tại cửa hàng của PetHouse trong vòng 7 ngày kể từ khi khách hàng mua sản phẩm. Quý khách vui lòng xuất trình hóa đơn với nhân viên cửa hàng.</li>
                    </ul>
                    <p>PetHouse chưa hỗ trợ các yêu cầu trả hàng / hoàn tiền thuộc về cảm quan như không ưng ý hoặc thay đổi quyết định mua hàng.</p>
                    <p>Trong mọi trường hợp khiếu nại, quyết định của PetHouse sẽ là quyết định cuối cùng.</p>
                </div>
                  
                <div id="bh" class="tabcontent">
                    <h3>Chính sách bảo hành</h3>
                    <h5>Điều kiện bảo hành</h5>
                    <p>Khách hàng sẽ được hưởng chính sách bảo hành trong trường hợp sản phẩm (thú cưng, phụ kiện) thỏa đồng thời các điều kiện sau:</p>
                    <ul>
                        <li>Còn trong thời hạn bảo hành (Tính từ ngày khách hàng nhận sản phẩm).</li>
                        <li>Có đầy đủ hóa đơn bán hàng của PetHouse, phiếu bảo hành (đối với thú cưng) và tem bảo hành (đối với phụ kiện).</li>
                    </ul>
                    <h5>Các trường hợp được bảo hành</h5>
                    <p>Đối với thú cưng gói bảo hành Basic</p>
                    <ul>
                        <li>Chế độ bảo hành toàn diện: (6 tháng)</li>
                        <ul>
                            <li>Trường hợp thú cưng xảy ra trường hợp xấu, không qua khỏi, PetHouse hỗ trợ 1 đổi 1 thú cưng với giá trị tương đương trong suốt thời gian bảo hành. </li>
                            <li>Gói bảo hành bao gồm các loại bệnh: Pravo – Care – Corona và tất cả trường hợp xấu phát sinh từ cơ thể cún.</li>
                        </ul>
                        <li>Chế độ khám & chữa bệnh miễn phí (6 tháng)</li>
                        <ul>
                            <li>Hỗ trợ sổ lãi miễn phí trong 12 tháng.</li>
                            <li>Khi cơ thể cún xuất hiện dấu hiệu bất thường, khách hàng cần thông báo ngay cho PetHouse để được hướng dẫn, điều trị cho bé từ ban đầu và hỗ trợ theo gói bảo hành.</li>
                            <li>Việc khách hàng mang các bé đến thú y trước khi thông báo với PetHouse về tình trạng của bé, dẫn đến trường hợp bé trở nặng sẽ không được hỗ trợ gói bảo hành. </li>
                        </ul>
                        <li>Chế độ bảo hành thuần chủng trọn đời</li>
                        <ul>
                            <li>Đảm bảo chó thuần chủng 100%, không lai tạp với những dòng khác.</li>
                            <li>Trường hợp phát hiện chó lai sẽ được 1 đổi 1 ngay.</li>
                        </ul>
                        <li>Ngoài ra còn có một số ưu đãi khác như: Giảm 20% phí dịch vụ Spa & Grooming trong 1 tháng; Giảm 10% hóa đơn phụ kiện trong 3 tháng; 3 lần miễn phí tắm Spa & Grooming.</li>
                    </ul>
                    <p>Đối với thú cưng gói bảo hành Premium</p>
                    <ul>
                        <li>Chế độ bảo hành toàn diện: (12 tháng)</li>
                        <ul>
                            <li>Trường hợp thú cưng xảy ra trường hợp xấu, không qua khỏi, PetHouse hỗ trợ 1 đổi 1 thú cưng với giá trị tương đương trong suốt thời gian bảo hành. </li>
                            <li>Gói bảo hành bao gồm các loại bệnh: Pravo – Care – Corona và tất cả trường hợp xấu phát sinh từ cơ thể cún.</li>
                        </ul>
                        <li>hế độ khám & chữa bệnh miễn phí (Trọn đời)</li>
                        <ul>
                            <li>Hỗ trợ sổ lãi miễn phí trong trọn đời</li>
                            <li>Khi cơ thể cún xuất hiện dấu hiệu bất thường, khách hàng cần thông báo ngay cho PetHouse để được hướng dẫn, điều trị cho bé từ ban đầu và hỗ trợ theo gói bảo hành.</li>
                            <li>Việc khách hàng mang các bé đến thú y trước khi thông báo với PetHouse về tình trạng của bé, dẫn đến trường hợp bé trở nặng sẽ không được hỗ trợ gói bảo hành. </li>
                        </ul>
                        <li>Chế độ bảo hành thuần chủng trọn đời</li>
                        <ul>
                            <li>Đảm bảo chó thuần chủng 100%, không lai tạp với những dòng khác.</li>
                            <li>Trường hợp phát hiện chó lai sẽ được 1 đổi 1 ngay.</li>
                        </ul>
                        <li>Hỗ trợ chi phí Vaccine đối với những loại được liệt kê trong Sổ theo dõi sức khỏe thú cưng.</li>
                        <li>Ngoài ra còn có một số ưu đãi khác như: Giảm 20% phí dịch vụ Spa & Grooming trong 1 tháng; Giảm 10% hóa đơn phụ kiện trong 3 tháng; 3 lần miễn phí tắm Spa & Grooming.</li>
                    </ul>
                    <h5>Các trường hợp không được bảo hành</h5>
                    <ul>
                        <li>PetHouse có quyền từ chối bảo hành thú cưng trong các trường hợp sau: Cún mất do nuốt phải dị vật, ngã từ trên cao, tai nạn giao thông; ăn phải thức ăn kiêng kỵ: socola, macca nguyên hạt, quả nho; thức ăn mốc, ôi thiu; chết không rõ nguyên nhân.</li>
                        <li>Thú cưng đã được chủ nuôi chuyển nhượng cho một bên thứ 3 – không đứng tên hóa đơn mua hàng tại PetHouse và sổ sức khỏe của cún.</li>
                    </ul>
                </div>

                <div id="gh" class="tabcontent">
                    <h3>Chính sách giao hàng</h3>
                    <p>Là đơn vị cung cấp thú cưng, phụ kiện chuyên nghiệp tại Tp.Huế, PetHouse luôn đảm bảo hỗ trợ vận chuyển sản phẩm đến được tay khách hàng trên khắp 63 tỉnh thành trên toàn quốc. Để hiểu rõ hơn về quy trình giao & nhận hàng tại PetHouse, quý khách vui lòng xem chi tiết tại phần bên dưới.</p>
                    <p><b>Phương thức giao hàng</b></p>
                    <ul>
                        <li>Đối với khách hàng mua trực tiếp: Sau khi thanh toán hoàn tất sẽ được nhận hàng ngay.</li>
                        <li>Đối với khách hàng mua hàng trực tuyến: Sau khi thanh toán hoàn tất, nhân viên PetHouse sẽ tiến hành đóng gói và giao cho đơn vị vận chuyển.</li>
                        <ul>
                            <li>Đối với mặt hàng phụ kiện sẽ được vận chuyển qua các đơn vị giao hàng hoặc nhân viên của PetHouse.</li>
                            <li>Đối với thú cưng gửi đi tỉnh sẽ được vận chuyển thông qua các chành xe đến khu vực gần nhà khách hàng. Nhà xe sẽ liên hệ để tiến hành giao hàng.</li>
                            <li>Đối với thú cưng gửi trong nội thành Huế sẽ được chuyển qua đơn vị giao hàng nhanh hoặc nhân viên của PetHouse.</li>
                        </ul>
                    </ul>
                    <p><b>Thời gian giao hàng</b></p>
                    <ul>
                        <li>Đối với đơn hàng nội thành Huế: Thời gian nhận hàng sẽ từ 1 – 3 ngày tùy vào vị trí của khách hàng.</li>
                        <li>Đối với đơn hàng ngoại tỉnh: Thời gian nhận hàng sẽ từ 2 – 7 ngày, tùy vào thời gian giao nhận của đối tác vận chuyển.</li>
                    </ul>
                    <p><b>Chi phí giao hàng</b></p>
                    <ul>
                        <li>Đối với thú cưng: </li>
                        <ul>
                            <li>PetHouse miễn phí 100% phí giao hàng đối với khách hàng trên địa bàn lãnh thổ Việt Nam.</li>
                            <li>Không hỗ trợ phí vận chuyển đối với khách hàng tại nước ngoài.</li>
                        </ul>
                        <li>Đối với phụ kiện: Pet Store Sài Gòn sẽ áp dụng tính phí theo quy định của các đối tác vận chuyển như Grab, Ahamove,…</li>
                    </ul>
                </div>

                  <div id="tt" class="tabcontent">
                    <h3>Chính sách thanh toán</h3>
                    <p>Tại PetHouse, chúng tôi chấp nhận thanh toán qua 5 hình thức: </p>
                    <ul>
                        <li>Thanh toán tiền mặt trực tiếp: Khách hàng sẽ tới cửa hàng mua trực tiếp và thanh toán tiền mặt cho nhân viên bán hàng.</li>
                        <li>Thanh toán COD (Thanh toán khi nhận hàng): Hình thức này chỉ áp dụng cho khách hàng tại Huế. Khách hàng tại tỉnh vui lòng chuyển khoản thanh toán 100%.</li>
                        <li>Thanh toán qua thẻ ngân hàng nội địa/Visa/Mastercard: Đối với hình thức này, khách hàng có thể thực hiện quẹt thẻ qua máy MPOS tại cửa hàng nếu mua trực tiếp hoặc thực hiện chuyển khoản trong trường hợp ở xa, theo thông tin tài khoản của </li>
                        <ul>
                            <li><b>Ngân Hàng MBbank</b></li>
                            <li><b>NGUYỄN HỮU TUẤN ANH</b></li>
                            <li><b>STK: 9704 **** **** ****</b></li>
                            <li><b>Chi nhánh: Huế</b></li>
                        </ul>
                        <li>Thanh toán qua ví điện tử: Momo, ZaloPay, VNPay</li>
                        <li>Thanh toán trả góp: Chi tiết vui lòng xem tại “Chính sách trả góp 0%”</li>
                    </ul>   
                  </div>

                  <div id="tg" class="tabcontent">
                    <h3>Chính sách trả góp 0% lãi suất</h3>
                    <p>Nhằm hỗ trợ khách hàng dễ dàng sở hữu một bé thú cưng mà không phải lo lắng về vấn đề tài chính, PetHouse áp dụng hình thức mua thú cưng trả góp 0% lãi suất bằng thẻ tín dụng và trả dần trong vòng từ 3-12 tháng mà không phải bổ sung bất kỳ giấy tờ nào ngoài CMND để xác minh chủ thẻ.</p>
                    <p><b>Quyền lợi chương trình trả góp 0%</b></p>
                    <ul>
                        <li>TẶNG 1 NĂM BẢO HIỂM THÚ CƯNG và CHỨNG NHẬN SỞ HỮU HỢP PHÁP VỚI THÚ CƯNG.</li>
                        <li>Bảo hành 15 ngày với mọi thú cưng bán ra từ hệ thống của PetHouse.</li>
                        <li>MIỄN PHÍ vận chuyển toàn quốc chặng đầu tiên.</li>
                        <li>Hỗ trợ thú y khám chữa bệnh tại nhà với khách hàng tại Huế</li>
                        <li>Hỗ trợ chi phí khám chữa bệnh trọn đời cho thú cưng ở Huế và vùng lân cận.</li>
                        <li>Tư vấn chăm sóc trọn đời về dinh dưỡng và sức khỏe.</li>
                        <li>Hỗ trợ trả góp đa kỳ hạn trong 3 – 6 – 9 – 12 tháng</li>
                    </ul>
                    <p><b>Điều kiện tham gia trả góp 0%</b></p>
                    <ul>
                        <li>Áp dụng đối với các loại thẻ thanh toán tín dụng Visa, MasterCard, JCB, Union pay của 26 ngân hàng trong nước phát hành.</li>
                        <li>Áp dụng đối với các giao dịch đơn hàng có giá trị từ 3 triệu (ngoại trừ VIB, FE Credit, Standard Chartered hỗ trợ từ 2 triệu).</li>
                        <li>Mỗi khách hàng được tham gia nhiều lần với điều kiện tổng giá trị các đơn hàng không vượt quá hạn mức thẻ tín dụng của Khách hàng.</li>
                        <li>Khách hàng không được hủy đơn hàng sau khi đã chuyển đổi giao dịch sang phương thức trả góp.</li>
                        <li>Khách hàng có thể đăng ký trả góp một phần hoặc toàn bộ giao dịch (nếu thẻ còn đủ hạn mức).</li>
                    </ul>
                    <p><b>Các trường hợp không được tham gia</b></p>
                    <ul>
                        <li>Tài khoản thẻ tín dụng của chủ thẻ đang trong tình trạng chậm thanh toán.</li>
                        <li>Hiệu lực còn lại của Thẻ tín dụng ít hơn thời hạn đăng ký trả góp.</li>
                        <li>Chủ thẻ vi phạm các Điều khoản & Điều kiện phát hành và sử dụng thẻ tín dụng quốc tế của ngân hàng phát hành.</li>
                        <li>Giao dịch đăng ký trả góp được thực hiện tại ĐVCNT không hợp tác triển khai Dịch vụ thanh toán trả góp lãi suất 0% bằng Thẻ Quốc tế với Ngân lượng hoặc Thẻ được phát hành bởi Ngân hàng không có hỗ trợ trả góp.</li>
                        <li>Giá trị giao dịch đăng ký trả góp nhỏ hơn số tiền tối thiểu/giao dịch theo quy định của từng ngân hàng có hỗ trợ trả góp.</li>
                        <li>Giao dịch trả góp đã lên sao kê.</li>
                    </ul>
                    <p><b>Hướng dẫn trả góp</b></p>
                    <ul>
                        <li>Trực tiếp tại cửa hàng</li>
                        <ul>
                            <li><b>Bước 1:</b> Nhân viên PetHouse sẽ tiến hành thao tác trên mPOS để chọn hình thức trả góp, loại thẻ và ngân hàng phát hành thẻ, thời gian trả góp tương ứng với thông tin khách hàng cung cấp (đăng kèm hình ảnh ngân hàng liên kết với mPOS).</li>
                            <li><b>Bước 2:</b> Khách hàng cung cấp số điện thoại và Email cho nhân viên. Sau đó, nhân viên các thông tin trên cùng số tiền, mô tả giao dịch vào các trường trên mPOS.</li>
                            <li><b>Bước 3:</b> Nhân viên bán hàng sẽ tiến hành quẹt thẻ của khách hàng vào thiết bị để chuyển đến bước thanh toán.</li>
                            <li><b>Bước 4:</b> Khi hệ thống nhận diện thẻ và xác nhận thành công, khách hàng hàng sẽ ký chữ ký số xác minh lên thiết bị smartphone của cửa hàng. </li>
                        </ul>
                        <li>Thanh toán từ xa</li>
                        <ul>
                            <li><b>Bước 1:</b> Nhân viên PetHouse sẽ tiến hành thao tác trên mPOS để chọn hình thức trả góp, loại thẻ và ngân hàng phát hành thẻ, thời gian trả góp tương ứng với thông tin khách hàng cung cấp (đăng kèm hình ảnh ngân hàng liên kết với mPOS)</li>
                            <li><b>Bước 2:</b> Khách hàng cung cấp số điện thoại và Email cho nhân viên. Sau đó, nhân viên tạo các thông tin trên cùng số tiền, mô tả giao dịch vào các trường trên mPOS.</li>
                            <li><b>Bước 3:</b> Nhân viên PetHouse sẽ inbox cho khách hàng thông qua Fanpage “PetHouse” hoặc “PetHouse” để gửi đường link điền thông tin. Đồng thời, để tránh trường hợp lừa đảo, nhân viên sẽ sử dụng số điện thoại 033 430 1474 để gọi xác minh và thông báo với khách hàng về đường link.</li>
                            <li><b>Bước 4:</b> Khách hàng truy cập vào đường link trên và điền các thông tin cần thiết như Số thẻ, Họ và tên in trên thẻ, Ngày hết hạn, Mã CVV/CVC, Địa chỉ email, Số điện thoại, Mã bảo mật. Sau khi điền đầy đủ, khách hàng lựa chọn “Thanh toán” để thực hiện thanh toán.</li>
                            <li><b>Bước 5:</b> Sau khi khách hàng chọn [Thanh toán], tuỳ từng loại thẻ thanh toán sẽ hiển thị các thông tin khác nhau như sau:</li>
                        </ul>
                        <li>Đối với thẻ 2D: giao dịch được thực hiện luôn và không cần xác nhận thông tin</li>
                        <li>Đối với thẻ 3D: giao dịch sẽ được tiếp tục chuyển đến bước xác nhận thông tin theo Ngân hàng phát hành thẻ quy định. Khách hàng làm xác nhận theo hướng dẫn của Ngân hàng để hoàn tất giao dịch</li>
                    </ul>
                  </div>

                  <div id="mh" class="tabcontent">
                    <h3>Tokyo</h3>
                    <p>Hướng dẫn mua hàng.</p>
                  </div>
            </div>

        </div>
    </div>
</section>

<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="section-title">
                    <h4>Video giới thiệu về PetHouse</h4>
                </div>
            </div>
        </div>
        <div class="row property__gallery">
            @foreach($all_video as $key => $video)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <form>
                        @csrf
                        <div class="product__item__pic set-bg">
                            <img src="{{asset('public/uploads/videos/'.$video->video_image)}}" alt="{{$video->video_title}}">
                        </div>
                        <div class="product__item__text">
                            <h6><a>{{substr_replace($video->video_title, "...", 47)}}</a></h6>
                            <div class="product__price">
                                <button type="button" class="btn btn-warning watch-video" data-toggle="modal" data-target="#exampleModalCenter" id="{{$video->video_id}}">Xem video</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="video_title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div id="video_link"></div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng video</button>
            </div>
        </div>
        </div>
    </div>

@endsection