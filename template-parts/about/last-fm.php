<?php
/**
 * Recently Played
 * 
 * Displays the last 10 last fm songs.
 * 
 * @package Stardust
 */

  $tracks = $args['recenttracks']['track'] ?? false;
  
?>

<?php if ( ! empty( $tracks ) ) : ?>
  <div class="recently-played">
    <div class="wrapper wrapper--large">
      <h2>Listening To</h2>
      <p>I do some of my best work listening to music. Here's a list of tracks I've got playing.</p>

       <ul class="recently-played__list">
        <?php 
          foreach( $tracks as $track ) : 
            [ 
              'name' => $song_name, 
              'url' => $song_url, 
              'artist' => [
                '#text' => $artist_name
              ],
              'image' => [
                '3' => [
                  '#text' => $cover_img
                ]
              ]
            
            ] = $track;
          ?>

          <li>
            <article class="track">
              <div class="track__media">
                <img 
                  src="<?php echo esc_attr( $cover_img ); ?>" 
                  alt="Cover Art for <?php echo esc_attr( $song_name ); ?> by <?php echo esc_attr( $artist_name ); ?>">
              </div>
              <div class="track__info">
                <h3 class="track__title">
                  <?php echo esc_attr( $song_name ); ?>
                </h3>
                <a 
                  class="track__link" 
                  href="<?php echo esc_attr( $song_url ); ?>" target="_blank"
                ></a>
                <div class="track__artist">
                  <span>
                    <?php echo esc_attr( $artist_name ); ?>
                  </span>
                </div>
              </div>
            </article>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

  </div>

<?php endif; ?>
