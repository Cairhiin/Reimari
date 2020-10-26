var $ = jQuery;
var templateUrl = emoteButton.templateUrl;

$(document).ready(function() {

const postId = $('.emoteButtons').data('postid');
let hasVoted = (+sessionStorage.getItem('postId') === postId);

if (hasVoted) {
  let voteOption = sessionStorage.getItem('voteChoice');
  const votedButton =
    $('.emoteButtons__buttonContainer:nth-child(' + voteOption +')')
    .children(":first")
    .addClass('voted');
} else {
  $('.emoteButtons__buttonContainer > button').click(function(){

    $(document)
      .ajaxStart(function () {
        hasVoted = true;
      })
      .ajaxStop(function () {
        hasVoted = false;
      });

    const buttonData = $(this).data('votes');
    const buttonId = $(this).data('id');
    const self = $(this);
    hasVoted || $.ajax({
            url: emoteButton.templateUrl,
            data : { action: "emoteButton", post_id : postId, button_id : buttonId },
            success: function(res) {
              sessionStorage.setItem('postId', postId);
              sessionStorage.setItem('voteChoice', buttonId);
              $('.emoteButtons__buttonContainer > button').unbind('click');
              self.children(":nth-child(2)").text(res.votes);
              self.data('votes', res.votes);
              self.addClass('voted');
              hasVoted = true;
            },
        });
    });
  }
});
