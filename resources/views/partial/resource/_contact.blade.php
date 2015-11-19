<section class="contact-info">
  <header><h3 class="contact-info-header">Thông tin liên hệ</h3></header>
  <ul>
    <li><i class="fa fa-user"></i>{{ $contactInfo->name }}</li>
    {{-- */ $location = LocationHelper::full($contactInfo->city, $contactInfo->district, $contactInfo->ward) /* --}}
    <li><i class="fa fa-home"></i>{{$contactInfo->address}} {{ $location['ward'] }}, {{ $location['district'] }}, {{ $location['city'] }}</li>
    <li><i class="fa fa-phone-square"></i>{{ $contactInfo->phone }}</li>
    <li><i class="fa fa-envelope"></i><a href="mailto:{{ $contactInfo->email }}" target="_top">{{ str_limit($contactInfo->email, 22) }}</a></li>
    <li><i class="fa fa-fax"></i>{{ $contactInfo->mobile }}</li>
    <li><i class="fa fa-facebook-official"></i>{{ str_limit($contactInfo->facebook, 22) }}</li>
    <li><i class="fa fa-skype"></i><a href="skype:{{ $contactInfo->skype }}?call">{{ str_limit($contactInfo->skype, 22) }}</a></li>
    <li><i class="fa fa-globe"></i>{{ str_limit($contactInfo->website, 22) }}</li>
  </ul>
</section>