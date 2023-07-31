<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム</title>
    @include('custom_header')
</head>
<body>

<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-2 mr-0 text-center" href="#">Instantgram</a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link nav-link">Sign out</button>
        </form>
    </li>
  </ul>
</nav>

<div class="container-fluid h-100">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
            <span class="nav-link active" style="color: inherit;">
              ようこそ　{{ $user->name }}
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Home <span class="sr-only"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="search"></span>
              Search
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <div role="main" class="tweet col-md-9 px-4" style="margin-left:15rem;">
        <form action="{{ route('create-post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <textarea class="tweet-input" name="caption" rows="3" placeholder="いまどうしてる？"></textarea>
            <!-- 画像を選択するためのinput -->
            <input type="file" class="hidden-input" name="image" id="image-input" accept="image/*">
            <!-- 画像を選択するためのラベル -->
            <label class="image-label" for="image-input">画像を選択</label>
            <button class="tweet-button">ツイートする</button>
            <!-- 選択した画像のプレビュー -->
            <img class="tweet-image" id="image-preview" src="#" alt="投稿画像">
        </form>

        <div class="container mt-4 w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 w-100">
                    <!-- フィードの投稿フォーム -->
                    <!-- ... 以前のコード ... -->

                    <!-- フィードの表示 -->
                    <div class="row justify-content-center mt-4 w-100">
                        @foreach($posts as $post)
                        <div class="col-md-8 post w-100">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->user->name }}</h5>
                                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="投稿画像なし" style="max-width:10rem;">
                                    <p class="card-text">{{ $post->caption }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


  </div>
</div>

</body>
<script>
  feather.replace();

  document.getElementById('image-input').addEventListener('change', function(event) {
            var file = event.target.files[0];
            var imagePreview = document.getElementById('image-preview');
            var reader = new FileReader();
            reader.onload = function() {
                imagePreview.src = reader.result;
            }
            if (file) {
                reader.readAsDataURL(file);
            }
        });
</script>

</html>
