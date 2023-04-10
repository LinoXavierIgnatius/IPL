import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class form extends HttpServlet {
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        out.println("<html>");
        out.println("<head>");
        out.println("</head>");
        out.println("<body>");
        out.println("<form action='./first' method='get'>");
        out.println("<label for='name'>Name:</label>");
        out.println("<input type='text' id='name' name='name'><br>");
        out.println("<label for='location'>Location:</label>");
        out.println("<input type='hidden' id='location' name='location'><br>");
        out.println("<input type='submit' value='Submit'>");
        out.println("</form>");
        out.println("</body>");
        out.println("</html>");
    }
}
