@extends('layout.apps')

@section('content')
<div class="admin-page container" style="margin-top: 10%">
    
    <center>
        <div>
            <h3>Publications</h3>
        </div>
        <table class="table table-striped">
            <tbody>
                @foreach ($publications as $publication)
              <tr>
                <td>
                    <div class="latest-publication-box">
                        <div class="title-section">
                            <img src="{{ URL::to('assets') }}/images/icons/publication.svg" alt="">
                            <div class="text">
                                <a href="{{ route('pub.show', $publication->id) }}">
                                    <p class="publication-title">{{ $publication->pub_name }}</p>
                                </a>
                                <p class="authors">
                                    <span class="designation">Author(s):</span>
                                    <a href="{{ route('bio.show', $publication->user_id) }}"><span
                                            class="name">{{ $publication->author_name }}</span></a>
                                </p>
                            </div>
                        </div>
                        <div class="download-section">
                            <a href="src/assets/pdf/lorem.pdf" download>
                                <a href="{{ asset('storage/pdfs/' . $publication->file) }}" download>
                                    <div class="download-button">
                                        <span>Download</span>
                                        <img src="{{ URL::to('assets') }}/images/icons/download.svg" alt="">
                                    </div>
                                </a>
                        </div>
                    </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </center>
</div>


@endsection
    