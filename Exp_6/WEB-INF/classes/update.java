import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.sql.*;
import java.sql.DriverManager;
import java.sql.Connection;

public class update extends HttpServlet {
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("text/html");
        Connection conn = null;
        Statement stmt = null;
        PrintWriter out = response.getWriter();
        String id = request.getParameter("id");
        String name = request.getParameter("name");
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/student", "root", "");
            stmt = conn.createStatement();
            String sql = "UPDATE db SET name='" + name + "' WHERE id='" + id + "'";
            int rowsAffected = stmt.executeUpdate(sql);
            if (rowsAffected > 0) {
                out.println("<h2> Updated successfully </h2>");
            } else {
                out.println("<h2> Error in updating details</h2>");
            }
            stmt.close();
            conn.close();
        } catch (Exception e) {
            System.out.print("Error connecting to db" + e);
        }
    }
}