<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label>
            <span class="fas fa-paperclip"></span>
            <input disabled='disabled' type="file" class="upload-attachment" name="file"
                accept="image/*, .txt, .rar, .zip" />
        </label>
        <label>
            <span class="emoji_picker fas fa-grin-beam"></span>
            <button id="emoji_picker" onclick="toggle()"></button>
        </label>
        <div id="tooltip" class="tooltip" role="tooltip">
            <emoji-picker class=" {{ Auth::user()->dark_mode > 0 ? 'dark' : 'light' }} "></emoji-picker>
        </div>
        <textarea id='sendtextarea' readonly='readonly' name="message" class="m-send app-scroll"
            placeholder="Type a message.."></textarea>

        <button disabled='disabled'><span class="fas fa-paper-plane"></span></button>

    </form>
</div>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script>
    const button = document.querySelector('#emoji_picker')
  const tooltip = document.querySelector('.tooltip')
  Popper.createPopper(button, tooltip)

  function toggle() {
      console.log('toggleFun');
    tooltip.classList.toggle('shown');
  }
</script>
<script>
    function emoji (value){
        var value= $('#sendtextarea').val();
    $('#sendtextarea').val(value + event.detail.unicode);
    console.log(value);
    };
    document.querySelector('emoji-picker')
  .addEventListener('emoji-click', event =>emoji(event.detail.unicode) );
</script>