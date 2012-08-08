arr = ["Dies ist Content Nr 1 ",
       "Dies ist Content Nr 2 "]

mousein = ->
  show(this)

mouseout = ->
  hide()

show = (link) ->
  #Reset the popups content
  $(".popup").children().remove()

  #Show the fitting text for the question
  id = $(link).attr("id")
  htmlcontent = arr[id]
  $(".popup").prepend(htmlcontent)

  #Display the popup and set it to the correct position
  $(".popup").show()
  newTop = $(link).offset().top - $(".popup").height()/2 + 11
  newLeft = $(link).offset().left - $(".popup").width() - 15

  $(".popup").offset({ top: newTop, left: newLeft})


hide = ->
  #hides the popup permanently
  $(".popup").hide()

resizePopup = ->
  #Displays Popup on right position
  newTop = $(".active").offset().top - $(".popup").height()/2 + 11
  newLeft = $(".active").offset().left - $(".popup").width() - 15

  $(".popup").offset({ top: newTop, left: newLeft})

startup = () ->
  #Add event handlers

  $(".pops").mouseenter(mousein)
  $(".pops").mouseleave(mouseout)
  $(window).resize(resizePopup)

  $(".popup").hide()

$(document).ready(startup)
