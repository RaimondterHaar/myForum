<?php

?>
<!-- BEGIN PAGINA CONTAINER -->
    <div class="container main-content">
      <div class="row first-row">

        <div class="col s12">
            <div class="card">
                <div class="card-content clearfix">
                    <span class="card-title">
Topic Titel&nbsp;
                        <span class="status-badge status-open">
Open
                        </span>
                    </span>
                </div>
            </div>

            <!-- BEGIN TOPIC -->
            <div class="card cyan lighten-5">
                <div class="card-content">
                    <div class="collection">
                        <div class="collection-item row">
                            <div class="col s3">
                                <div class="avatar collection-link">
                                    <div class="row">
                                        <div class="col s3">
                                            <img src="http://www.gravatar.com/avatar/fc7d81525f7040b7e34b073f0218084d?s=50" alt="" class="square">
                                        </div>
                                        <div class="col s9">
                                            <p class="user-name">SMN</p>
                                        </div>
                                    </div>
                                    <p class="post-timestamp">
Gepost op 12-10-2015 11:00
</p>
                                </div>
                            </div>
                            <div class="col s9">
                                <div class="row last-row">
                                    <div class="col s12">
                                        <h6 class="title">Titel van de topic</h6>
                                        <p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium neque fugiat eius illo. Dignissimos voluptatem, architecto. Aspernatur consequatur hic dolorem, atque optio incidunt quibusdam dolorum eveniet, distinctio minima velit rerum.
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis tempore, delectus temporibus maxime ad expedita repudiandae hic nulla minus impedit, aperiam nam dolorem ullam itaque consectetur eaque numquam totam pariatur?
                                        </p>
                                    </div>
                                </div>
                                <div class="row last-row block-timestamp">
                                    <div class="col s6 push-s6">
                                        <p class="post-timestamp last-post-timestamp">Laatst aangepast op: xx-xx-xxxx xx:xx</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- EINDE TOPIC -->

            <!-- BEGIN REPLY -->
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Replies</span>
                    <div class="collection">
                        <div class="collection-item row">
                            <div class="col s2">
                                <span class="reply-username">Username</span>
                                <span class="reply-timestamp">Geplaatst op</span>
                            </div>
                            <div class="col s10">
                                <p>Reply tekst</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- EINDE REPLY -->

            <!-- TOEVOEGEN VAN EEN REPLY -->
            <div class="card">
                <div class="card-content">
                    <form method="POST" action="">
                        <div class="row">
                            <div class="input-field col s6 has-error">
                                <input id="title" type="text" name="title" placeholder="Tik hier een titel voor het onderwerp in">
                                <label for="title" class="active">Titel van de topic</label>
                                <span>Titel is verplicht!</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <textarea id="message-body" name="body"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6 push-s6">
                                <a href="" class="btn right cyan darken-1">
Bewaren
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- EINDE TOEVOEGEN VAN EEN REPLY -->

        </div>
      </div>
    </div>
    <!-- EINDE PAGINA CONTAINER -->