 <form id="addComments" method="POST" action="{!! route('article.commentsCreate', ['id' => $article->id]) !!}">
    @csrf
    <div class="form-group row">

        <div class="col-md-12">
            <textarea id="text" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" placeholder="Type in your commentary here" name="text" required>{{ old('text') }}</textarea>
            @if ($errors->has('text'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('text') }}</strong>
                </span>
            @endif
        </div>
    </div>
     <div class="form-group row mb-0">
         <div class="col-md-12 offset-md-12">
             <button type="submit" class="btn btn-primary">
                 {{ __('Send Comments') }}
             </button>
         </div>
     </div>
</form>

 @push('scripts')
     <script>
         $(document).ready(function (e) {
             var navigationFn = {
                 goToSection: function(id) {
                     $('html, body').animate({
                         scrollTop: $(id).offset().top - 100
                     }, 100);
                 }
             };
             $('.reply-comment').on('click', function (e) {
                 e.preventDefault();
                 let id = $(this).attr('data-value'),
                     name = $(this).siblings('h5').find('a').text(),
                     textarea = $('#addComments').find('textarea');
                 navigationFn.goToSection('#addComments');
                 textarea.siblings().remove();
                 textarea.before('<p>Reply for: '+ name +'</p>')
                 textarea.after('<input type="hidden" name="comment_id" value="'+ id +'">');
             });
             $('#addComments').on('submit', function (e) {
                 e.preventDefault();
                 let commentsWindow = $('.comments-window'),
                     textarea = $('#addComments').find('textarea#text'),
                     url = "{!! route('article.commentsCreate', ['id' => $article->id]) !!}",
                     data = $(this).serialize(),
                     text = textarea.val();
                 $.ajax({
                     url: url,
                     data: data,
                     type: 'post',
                     success: function (data) {
                         let route = '/user/profile/' + data.comment.user_id,
                             countComentaries = parseInt($('.comments-title').attr('data-value'));
                        ++countComentaries;
                         $('.comments-title').text('('+ countComentaries +') comentaries').attr('data-value', countComentaries);
                         if (data.comment.answered_comment_id !== undefined ) {
                             commentsWindow.find('a[data-value='+ data.comment.answered_comment_id +']').parent().append(''+
                                 '          <div class="media mt-4">\n' +
                                 '              <a href="'+ route +'">' +
                                 '              <img class="d-flex mr-3 rounded-circle"\n' +
                                 '                                                 src="'+ data.avatar +'"\n' +
                                 '                                                 alt="Avatar '+ data.name +'">\n' +
                                 '              </a>' +
                                 '              <div class="media-body">\n' +
                                 '                  <h5 class="mt-0"><a href="'+ route +'">'+ data.name +'</a></h5>\n' +
                                 '                  <p>'+ text +'</p>\n' +
                                 '                  <small class="text-muted">'+ data.comment.created_at +'</small>\n' +
                                 '              </div>\n' +
                                 '         </div>\n'
                             );
                         } else {
                             commentsWindow.prepend(''+
                                 '<div class="comment">\n' +
                                 '     <div class="row">\n' +
                                 '          <div class="media mb-4">\n' +
                                 '              <a href="'+ route +'">' +
                                 '              <img class="d-flex mr-3 rounded-circle"\n' +
                                 '                                                 src="'+ data.avatar +'"\n' +
                                 '                                                 alt="Avatar '+ data.name +'">\n' +
                                 '              </a>' +
                                 '              <div class="media-body">\n' +
                                 '                  <h5 class="mt-0"><a href="'+ route +'">'+ data.name +'</a></h5>\n' +
                                 '                  <p>'+ text +'</p>\n' +
                                 '                  <small class="text-muted">'+ data.comment.created_at +'</small>\n' +
                                 '                  <a class="reply-comment" data-value="'+ data.comment.id +'" href="#">Reply</a>\n' +
                                 '              </div>\n' +
                                 '         </div>\n' +
                                 '     </div>\n' +
                                 '</div>'
                             );
                         }
                         clear();
                     },
                     error: function (xhr, status, error) {
                         let response = JSON.parse(xhr.responseText);
                         $.each(response.errors, function (key, error) {
                             textarea.addClass('is-invalid');
                             textarea.parent().append('' +
                                 '<span class="invalid-feedback" role="alert">\n' +
                                 '     <strong>'+ error[0] +'</strong>\n' +
                                 '</span>');
                         });
                     }
                 });
             });
             function clear() {
                 let textarea = $('#addComments').find('textarea#text');
                 textarea.siblings().remove();
                 textarea.removeClass('is-invalid').val('').siblings().remove();
             }
         });
     </script>
 @endpush
