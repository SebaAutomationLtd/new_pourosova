<!doctype html>
<html lang="en">

<head>
    <title>বানিজ্যিক হোল্ডিং খসড়া রিপোর্ট</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">


    <link rel="stylesheet" type="text/css" href="{{ public_path('css/pdf.css') }}">


</head>

<body>


    <main>
        <htmlpageheader name="page-header" style="display:none">
            <header style="padding-bottom: 100px">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td ><img src="{{ public_path('img/logo.png') }}" width="80" alt=""></td>
                            <td >
                                <h1 class="heading-text">{{ @$website_data->title_bangla }} পৌরসভা</h1>
                                <h3 class="sub-heading-text">{{ @$website_data->title_bangla }}, ময়মনসিংহ</h3>
                                <h3 class="report-name">বানিজ্যিক হোল্ডিং খসড়া রিপোর্ট</h3>
                            </td>
                            <td style="text-align: right">
                                <img src="{{ public_path('img/mujib_sotoborso.svg') }}" width="80" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>ওয়ার্ড নং : ১, </span>
                            </td>
                            <td style="text-align: right">
                                <span>গ্রাম : </span>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </header>
        </htmlpageheader>

        <div style="padding-top: 100px">
            <table class="bordered-table">
                <thead>
                    <tr>
                        <th>ক্রমিক নং</th>
                        <th>হোল্ডিং</th>
                        <th>নাম</th>
                        <th>পিতা</th>
                        <th>ভোটার আইডি নং</th>
                        <th>মেবাইল নং</th>
                        <th>রুম সংখ্যা</th>
                        <th>দৈর্ঘ</th>
                        <th>প্রস্থ</th>
                        <th>বাৎসরিক মূল্যায়ন</th>
                        <th>বাৎসরিক কর</th>
                        <th>সব শেষ কর পরিশোধ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->holding_no }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->father_name }}</td>
                            <td>{{ $item->nid }}</td>
                            <td>{{ $item->mobile }}</td>
                            <td>{{ $item->number_room }}</td>
                            <td>{{ $item->length_number }}</td>
                            <td>{{ $item->width_number }}</td>
                            <td>{{ $item->house_year_value }}</td>
                            <td>{{ $item->yearly_vat }}</td>
                            <td>{{ $item->last_tax_year }}</td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>

            </table>
        </div>

    </main>

</body>

</html>
