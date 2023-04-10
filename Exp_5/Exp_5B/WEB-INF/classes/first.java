import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class first extends HttpServlet {
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        String name = request.getParameter("name");
        out.println("<html>");
        out.println("<body>");
        out.println("<h1>Hello " + name + "</h1>");
        out.println("<form action='./second' method='get'>");
        out.println("<label for='name'>Name:</label>");
        out.println("<input type='hidden' id='name' name='name' value="+name+"><br>");
        out.println("<label for='location'>Location:</label>");
        out.println("<input type='text' id='location' name='location' value=" + location + "><br>");
        out.println("<input type='submit' value='Submit'>");
        out.println("</form>");
        out.println("</body>");
        out.println("</html>");
    }
}
