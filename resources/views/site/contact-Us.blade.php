@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>Contact Us | Minemenu</title>
@endsection
@section('main')

    <!-- app main -->
    <section class="main_detail_section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="description_shop_holder">
                        <div class="map-contact-us">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d25900.599397618982!2d51.326393822753914!3d35.76125132297352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1593090918408!5m2!1sen!2s"
                                width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="contact_box">
                        <h3>@lang('text.contact_us')</h3>
                        <div>
                            <ul>
                                <li class="address_contact_shop">تهران ، خیابان بنی هاشم ، رو به روی پاساژ الماس بنی
                                    هاشم ، کوچه سپید ، مجتمع سپیده
                                </li>
                                <li class="phone_contact_shop">+981234567</li>
                                <li class="fax_contact_shop">+981234567</li>
                                <li class="whatsapp_contact_shop">+981234567 <span>(@lang('text.whatsapp')</span></li>
                                <li class="email_contact_shop">shop@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
