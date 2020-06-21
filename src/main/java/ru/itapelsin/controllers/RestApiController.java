package ru.itapelsin.controllers;

import com.google.common.io.CharStreams;
import com.google.gson.Gson;
import lombok.Data;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;
import ru.itapelsin.persistence.Account;
import ru.itapelsin.persistence.Category;
import ru.itapelsin.persistence.Comment;
import ru.itapelsin.persistence.Offer;
import ru.itapelsin.repositories.AccountRepository;
import ru.itapelsin.repositories.CategoryRepository;
import ru.itapelsin.repositories.CommentRepository;
import ru.itapelsin.repositories.OfferRepository;

import javax.servlet.http.HttpServletRequest;
import java.io.IOException;
import java.io.InputStreamReader;
import java.nio.charset.StandardCharsets;
import java.time.Instant;
import java.util.*;

@RestController
@RequestMapping(path = "api")
public class RestApiController {

    @Autowired
    private Gson gson;

    @Autowired
    private OfferRepository offerRepository;

    @Autowired
    private CategoryRepository categoryRepository;

    @Autowired
    private AccountRepository accountRepository;

    @Autowired
    private CommentRepository commentRepository;

    @Autowired
    private Random random;

    private String receiveRequest(HttpServletRequest request) throws IOException {
        return CharStreams.toString(
                new InputStreamReader(request.getInputStream(), StandardCharsets.UTF_8));
    }

    @RequestMapping(path = "/categories", method = RequestMethod.GET)
    public String getCategories() {
        return gson.toJson(categoryRepository.findAll());
    }
    
    @RequestMapping(path = "/add-category", params = {"name", "color"}, method = RequestMethod.GET)
    public HttpStatus addCategory(@RequestParam("name") String name, @RequestParam("color") String color) {
        Category category = new Category();
        category.setName(name);
        category.setColor(Integer.parseInt(color));
        categoryRepository.saveAndFlush(category);
        return HttpStatus.OK;
    }

    @RequestMapping(path = "/rand-offer", method = RequestMethod.POST)
    public String randOffer(HttpServletRequest request) throws IOException {
        String requestBody = receiveRequest(request);
        List<Double> categoryIds = gson.<List<Double>>fromJson(requestBody, List.class);
        Set<Category> categorySet = new HashSet<>();
        for (Double category : categoryIds) {
            categoryRepository.findById(Math.round(category)).ifPresent(categorySet::add);
        }
        List<Offer> result = offerRepository.findByCategory(categorySet);
        return gson.toJson(result.get(random.nextInt(result.size())));
    }

    @RequestMapping(path = "/top-offers", method = RequestMethod.GET)
    public String topOffer() {
        List<Offer> result = offerRepository.top();
        return gson.toJson(result.subList(0, Math.min(result.size(), 10)));
    }

    @RequestMapping(path = "/my-offers", params = {"user-id", "num"}, method = RequestMethod.GET)
    public String getMyOffers(@RequestParam("user-id") Long userId, @RequestParam("num") Integer num) {
        return gson.toJson(accountRepository.findById(userId)
                .map(offerRepository::findByAuthor)
                .map(result -> result.subList(0, Math.min(result.size(), num)))
                .orElse(new ArrayList<>()));
    }

    @RequestMapping(path = "/add-offer", method = RequestMethod.POST)
    public HttpStatus addOffer(HttpServletRequest httpRequest) throws IOException {
        String requestBody = receiveRequest(httpRequest);
        NewOfferRequest request = gson.fromJson(requestBody, NewOfferRequest.class);
        Account account = accountRepository.getOne(request.getUserId());
        Category category = categoryRepository.getOne(request.getCategory());

        Offer offer = new Offer();
        offer.setAuthor(account);
        offer.setCategory(category);
        offer.setTitle(request.getTitle());
        offer.setCreated(Instant.now());
        offer.setEssence(request.getEssence());

        offerRepository.saveAndFlush(offer);
        return HttpStatus.OK;
    }

    @RequestMapping(path = "auth", method = RequestMethod.POST)
    public String auth(HttpServletRequest httpServletRequest) throws IOException {
        String requestBody = receiveRequest(httpServletRequest);
        AuthRequest authRequest = gson.fromJson(requestBody, AuthRequest.class);
        return gson.toJson(accountRepository.findByEmailAndPassword(authRequest.getEmail(),
                authRequest.getPassword()).orElse(null));
    }

    @RequestMapping(path = "change-password", method = RequestMethod.POST)
    public HttpStatus changePassword(HttpServletRequest httpRequest) throws IOException {
        String requestBody = receiveRequest(httpRequest);
        ChangePasswordRequest request = gson.fromJson(requestBody, ChangePasswordRequest.class);
        Optional<Account> accountOptional = accountRepository.findById(request.getUserId());
        if (accountOptional.isPresent()) {
            Account account = accountOptional.get();
            account.setPassword(request.getNewPassword());
            accountRepository.saveAndFlush(account);
            return HttpStatus.OK;
        } else {
            return HttpStatus.BAD_REQUEST;
        }
    }

    @RequestMapping(path = "/like", params = "offerId", method = RequestMethod.GET)
    public HttpStatus addLike(@RequestParam("offerId") Long offerId) {
        Optional<Offer> offerOptional = offerRepository.findById(offerId);
        if (offerOptional.isPresent()) {
            Offer offer = offerOptional.get();
            offer.setLikes(offer.getLikes() + 1);
            offerRepository.saveAndFlush(offer);
            return HttpStatus.OK;
        }
        return HttpStatus.BAD_REQUEST;
    }

    @RequestMapping(path = "/dislike", params = "offerId", method = RequestMethod.GET)
    public HttpStatus addDislike(@RequestParam("offerId") Long offerId) {
        Optional<Offer> offerOptional = offerRepository.findById(offerId);
        if (offerOptional.isPresent()) {
            Offer offer = offerOptional.get();
            offer.setDislikes(offer.getDislikes() + 1);
            offerRepository.saveAndFlush(offer);
            return HttpStatus.OK;
        }
        return HttpStatus.BAD_REQUEST;
    }

    @RequestMapping(path = "/register", method = RequestMethod.POST)
    public HttpStatus register(HttpServletRequest httpRequest) throws Exception {
        String requestBody = receiveRequest(httpRequest);
        RegisterRequest request = gson.fromJson(requestBody, RegisterRequest.class);
        Account account = new Account();
        account.setUsername(request.getUsername());
        account.setEmail(request.getEmail());
        account.setPassword(request.getPassword());
        account.setIcon(request.getImage());
        accountRepository.saveAndFlush(account);
        return HttpStatus.OK;
    }

    @RequestMapping(path = "/comment", method = RequestMethod.POST)
    public HttpStatus addComment(HttpServletRequest httpRequest) throws IOException {
        String requestBody = receiveRequest(httpRequest);
        AddCommentRequest request = gson.fromJson(requestBody, AddCommentRequest.class);

        Optional<Offer> offerOptional = offerRepository.findById(request.offer);
        Optional<Account> authorOptional = accountRepository.findById(request.getAuthor());
        if (offerOptional.isPresent() && authorOptional.isPresent()) {
            Offer offer = offerOptional.get();
            Account author = authorOptional.get();

            Comment comment = new Comment();
            comment.setAuthor(author);
            comment.setOffer(offer);
            comment.setInstant(Instant.now());
            comment.setText(request.getComment());

            commentRepository.saveAndFlush(comment);
            return HttpStatus.OK;
        }

        return HttpStatus.BAD_REQUEST;
    }

    @Data
    public static class AddCommentRequest {
        Long offer;
        Long author;
        String comment;
    }

    @Data
    public static class AuthRequest {
        String email;
        String password;
    }

    @Data
    public static class ChangePasswordRequest {
        Long userId;
        String newPassword;
    }

    @Data
    public static class NewOfferRequest {
        Long userId;
        Long category;
        String title;
        String essence;
    }

    @Data
    public static class RegisterRequest {
        String username;
        String email;
        String password;
        byte[] image;
    }
}
