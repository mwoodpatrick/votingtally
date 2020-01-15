<?php
/**
 * Outputs the Voting Tally Interface.
 *
 * @package votingtally
 */

namespace VotingTally\Includes;

/**
 * Class Output
 */
class Output {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		add_action( 'the_content', array( $this, 'maybe_output_interface' ) );
	}

	/**
	 * Output the Voting Tallery button interface.
	 *
	 * @param string $content The Post content.
	 *
	 * @return string Modified content.
	 */
	public function maybe_output_interface( $content ) {
		if ( ! is_singular() || ! is_user_logged_in() ) {
			return $content;
		}
		ob_start();
		?>	
		<div class="voting-tally">
			<h5><?php esc_html_e( 'Rank This Post', 'votingtally' ); ?></h5>
			<button class="vote-upwards" aria-label="<?php esc_attr_e( 'Vote this item positive', 'votingtallery' ); ?>" data-nonce="<?php echo esc_html( wp_create_nonce( 'votingtallery-vote-positive' ) ); ?>" data-id="<?php echo absint( get_the_ID() ); ?>" data-action="vote-upwards">
				<img src="<?php echo esc_url( VOTINGTALLY_URL . 'images/thumbs-up.png' ); ?>" alt="Thumbs Up Button" />
			</button>
			<button class="vote-downwards" aria-label="<?php esc_attr_e( 'Vote this item negative', 'votingtallery' ); ?>" data-nonce="<?php echo esc_html( wp_create_nonce( 'votingtallery-vote-negative' ) ); ?>" data-id="<?php echo absint( get_the_ID() ); ?>" data-action="vote-downwards">
				<img src="<?php echo esc_url( VOTINGTALLY_URL . 'images/thumbs-down.png' ); ?>" alt="Thumbs Down Button" />
			</button>
		</div>
		<?php
		return $content . ob_get_clean();
	}
}
