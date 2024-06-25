
import turtle
#Ashar Afaq
# this program draws shapes and colors
def square(x, y, width, color):
    turtle.penup()
    turtle.goto(x, y)
    turtle.fillcolor(color)
    turtle.pendown()
    turtle.begin_fill()
    for count in range(4):
        turtle.forward(width)
        turtle.left(90)
    turtle.end_fill()

def circle(x, y, radius, color):
    turtle.penup()
    turtle.goto(x, y- radius)
    turtle.fillcolor(color)
    turtle.pendown()
    turtle.begin_fill()
    turtle.circle(radius)
    turtle.end_fill()

def line(startX, startY, endX, endY, color):
    turtle.penup()
    turtle.goto(startX, startY)
    turtle.pendown()
    turtle.pencolor(color)
    turtle.goto(endX, endY)

def octagon(startX, startY, color):
    turtle.penup()
    turtle.goto(startX, startY)
    turtle.fillcolor(color)
    turtle.pendown()
    turtle.begin_fill()
    for x in range(8):
        turtle.forward(50)
        turtle.right(45)
    turtle.end_fill()

X1 = 0
Y1 = 100
X2 = 100
Y2 = -100
X3 = -100
Y3 = -100
RADIUS = 50

def main():

    turtle.hideturtle()
    square(X2, -Y2, (X3 - X2), 'gray')

    circle(X1, Y1, RADIUS, 'blue')
    circle(X2, Y2, RADIUS, 'green')
    circle(X3, Y3, RADIUS, 'red')

    line(X1, Y1, X2, Y2, 'black')
    line(X1, Y1, X3, Y3, 'black')
    line(X2, Y2, X3, Y3, 'black')


    octagon(-25 ,270 , 'yellow')
    turtle.Screen().exitonclick()   
if __name__=='__main__':
    main()

